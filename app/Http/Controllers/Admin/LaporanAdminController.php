<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\LaporanService;
use App\Repositories\LaporanRepository;
use App\Http\Requests\UpdateLaporanStatusRequest;
use App\Http\Requests\StoreLaporanRequest;
use App\Models\KategoriBarang;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class LaporanAdminController extends Controller
{
    protected $service;
    protected $repo;

    public function __construct(LaporanService $service, LaporanRepository $repo)
    {
        $this->service = $service;
        $this->repo = $repo;
        $this->middleware(['auth','verified','role:admin|petugas']);
    }

    public function index(Request $request)
    {
        if($request->ajax()){
            $laporan = \App\Models\LaporanKehilangan::all();
            return DataTables::of($laporan)
                ->addIndexColumn()
                ->addColumn('aksi', function($row){
                    $btn = '<a href="'.route('admin.laporan.detail', $row->id_laporan).'" class="px-3 py-1 bg-blue-500 text-white text-xs rounded">Lihat</a>';
                    if($row->status === 'submitted'){
                        $btn .= ' <form action="'.route('admin.laporan.verifikasi', $row->id_laporan).'" method="POST" class="inline ml-1">'.csrf_field().'<button type="submit" class="px-3 py-1 bg-green-500 text-white text-xs rounded" onclick="return confirm(\'Verifikasi laporan ini?\')">Verifikasi</button></form>';
                    }
                    return $btn;
                })
                ->editColumn('tanggal_lapor', function($row){ 
                    return $row->tanggal_lapor ? date('d M Y', strtotime($row->tanggal_lapor)) : '-'; 
                })
                ->editColumn('status', function($row){
                    if($row->status === 'submitted') return '<span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-800 rounded">Submitted</span>';
                    if($row->status === 'verified') return '<span class="px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded">Verified</span>';
                    if($row->status === 'processing') return '<span class="px-2 py-1 text-xs bg-orange-100 text-orange-800 rounded">Processing</span>';
                    if($row->status === 'done') return '<span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded">Done</span>';
                    if($row->status === 'found') return '<span class="px-2 py-1 text-xs bg-emerald-100 text-emerald-800 rounded">Found</span>';
                    if($row->status === 'rejected') return '<span class="px-2 py-1 text-xs bg-red-100 text-red-800 rounded">Rejected</span>';
                    return '<span class="px-2 py-1 text-xs bg-gray-100 text-gray-800 rounded">'.ucfirst($row->status).'</span>';
                })
                ->rawColumns(['aksi', 'status'])
                ->make(true);
        }

        return view('admin.laporan.index');
    }

    public function create()
    {
        $kategori = KategoriBarang::orderBy('nama_kategori')->get();
        return view('admin.laporan.create', compact('kategori'));
    }

    public function store(StoreLaporanRequest $request)
    {
        $data = $request->validated();
        $lap = $this->service->createLaporan($data, $request->user());

        if($request->hasFile('lampiran')){
            foreach($request->file('lampiran') as $file){
                $this->service->uploadLampiran($lap, $file, 'lampiran', $request->user());
            }
        }

        return redirect()->route('admin.laporan.index')->with('success', 'Laporan berhasil dibuat.');
    }

    public function show($id)
    {
        $lap = $this->repo->findById($id);
        return view('admin.laporan.show', compact('lap'));
    }

    public function verifikasi(Request $request, $id)
    {
        $user = Auth::user();
        $this->service->verify($id, $user->id_user, 'verified', $request->input('catatan'));
        return redirect()->route('admin.laporan.detail', $id)->with('success','Laporan berhasil diverifikasi');
    }

    public function updateStatus(UpdateLaporanStatusRequest $request, $id)
    {
        $user = Auth::user();
        $this->service->updateStatus($id, $user->id_user, $request->status, $request->catatan);
        return redirect()->route('admin.laporan.detail', $id)->with('success','Status laporan diupdate');
    }

    public function cetakSurat($nomor)
    {
        $lap = $this->repo->findByNomor($nomor);
        if(!$lap) abort(404);
        $pdf = Pdf::loadView('admin.laporan.surat', compact('lap'));
        return $pdf->stream("surat_{$lap->nomor_laporan}.pdf");
    }
}
