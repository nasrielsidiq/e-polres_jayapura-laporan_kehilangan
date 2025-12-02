<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\LaporanRepository;
use Barryvdh\DomPDF\Facade\Pdf;

class StatusController extends Controller
{
    protected $repo;

    public function __construct(LaporanRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        return view('status.index'); // form input nomor laporan
    }

    public function search(Request $request)
    {
        $request->validate(['nomor_laporan' => 'required|string']);
        $lap = $this->repo->findByNomor($request->nomor_laporan);
        if(!$lap) return back()->withErrors(['nomor_laporan' => 'Nomor laporan tidak ditemukan']);
        return view('status.show', compact('lap'));
    }

    public function cetakBukti($nomor)
    {
        $lap = $this->repo->findByNomor($nomor);
        if(!$lap) abort(404);
        $pdf = Pdf::loadView('laporan.cetak_bukti', compact('lap'));
        return $pdf->stream("bukti_{$lap->nomor_laporan}.pdf");
    }
}
