<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BeritaAcara;
use App\Models\LaporanKehilangan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class BeritaAcaraController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin|petugas');
    }

    public function index()
    {
        $beritaAcaras = BeritaAcara::with(['laporan.user', 'creator'])
            ->latest()
            ->paginate(15);

        return view('admin.berita-acara.index', compact('beritaAcaras'));
    }

    public function create($laporanId)
    {
        $laporan = LaporanKehilangan::with(['user', 'kategori'])->findOrFail($laporanId);
        
        if (!in_array($laporan->status, ['done', 'found'])) {
            return redirect()->back()->withErrors(['error' => 'Berita acara hanya dapat dibuat untuk laporan dengan status selesai atau ditemukan']);
        }

        // Check if berita acara already exists
        $existingBA = BeritaAcara::where('id_laporan', $laporanId)->first();
        if ($existingBA) {
            return redirect()->route('admin.berita-acara.show', $existingBA->id);
        }

        return view('admin.berita-acara.create', compact('laporan'));
    }

    public function store(Request $request, $laporanId)
    {
        $request->validate([
            'keterangan' => 'nullable|string|max:1000'
        ]);

        $laporan = LaporanKehilangan::findOrFail($laporanId);
        
        $beritaAcara = BeritaAcara::create([
            'nomor_ba' => $this->generateNomorBA(),
            'id_laporan' => $laporanId,
            'created_by' => Auth::user()->id_user,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('admin.berita-acara.show', $beritaAcara->id)
            ->with('success', 'Berita acara berhasil dibuat');
    }

    public function show($id)
    {
        $beritaAcara = BeritaAcara::with(['laporan.user', 'laporan.kategori', 'creator'])->findOrFail($id);
        return view('admin.berita-acara.show', compact('beritaAcara'));
    }

    public function print($id)
    {
        $beritaAcara = BeritaAcara::with(['laporan.user', 'laporan.kategori', 'creator'])->findOrFail($id);
        $pdf = Pdf::loadView('admin.berita-acara.print', compact('beritaAcara'));
        return $pdf->stream("berita_acara_{$beritaAcara->nomor_ba}.pdf");
    }

    private function generateNomorBA()
    {
        $year = now()->format('Y');
        $count = BeritaAcara::whereYear('created_at', now()->year)->count() + 1;
        return sprintf('BA-%s-%05d', $year, $count);
    }
}