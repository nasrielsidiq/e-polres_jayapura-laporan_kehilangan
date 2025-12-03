<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreLaporanRequest;
use App\Services\LaporanService;
use App\Repositories\LaporanRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    protected $service;
    protected $repo;

    public function __construct(LaporanService $service, LaporanRepository $repo)
    {
        $this->service = $service;
        $this->repo = $repo;
        $this->middleware(['auth','verified','role:pelapor']);
    }

    public function create()
    {
        // show create form — gunakan blade resources/views/laporan/create.blade.php
        $kategoris = \App\Models\KategoriBarang::all();
        return view('laporan.create', compact('kategoris'));
    }

    public function store(StoreLaporanRequest $request)
    {
        $data = $request->validated();
        // dd($data);
        $lap = $this->service->createLaporan($data, $request->user());

        // handle multiple lampiran
        if($request->hasFile('lampiran')){
            foreach($request->file('lampiran') as $file){
                $this->service->uploadLampiran($lap, $file, 'lampiran', $request->user());
            }
        }

        return redirect()->route('laporan.saya')->with('success', 'Laporan berhasil dibuat. Nomor: '.$lap->nomor_laporan);
    }

    public function riwayat(Request $request)
    {
        $user = Auth::user();
        $query = $user->laporan()->with('kategori');

        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        $laporan = $query->orderByDesc('tanggal_lapor')->paginate(10);
        $currentStatus = $request->get('status');

        return view('laporan.riwayat', compact('laporan', 'currentStatus'));
    }

    public function show($id)
    {
        $lap = $this->repo->findById($id);
        // dd($lap->riwayat()->latest()->get()[0]);
        // Pastikan hanya pemilik atau petugas/admin bisa lihat detail (tapi middleware sudah role:pelapor)
        if($lap->id_user !== Auth::id() && !Auth::user()->hasAnyRole(['admin','petugas', 'pelapor'])){
            abort(403);
        }
        return view('laporan.detail', compact('lap'));
    }

    public function uploadLampiran(Request $request, $id)
    {
        $lap = $this->repo->findById($id);
        if($lap->id_user !== Auth::id()){
            abort(403);
        }

        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120'
        ]);

        $this->service->uploadLampiran($lap, $request->file('file'), 'lampiran', $request->user());

        return back()->with('success', 'Lampiran berhasil diunggah');
    }
}
