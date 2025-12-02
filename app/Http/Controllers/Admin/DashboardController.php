<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\LaporanRepository;

class DashboardController extends Controller
{
    protected $repo;
    public function __construct(LaporanRepository $repo)
    {
        $this->repo = $repo;
        $this->middleware(['auth','verified','role:admin|petugas']);
    }

    public function index()
    {
        $total_laporan = \App\Models\LaporanKehilangan::count();
        $laporan_pending = \App\Models\LaporanKehilangan::where('status','pending')->count();
        $laporan_selesai = \App\Models\LaporanKehilangan::where('status','selesai')->count();
        
        return view('admin.dashboard', compact('total_laporan','laporan_pending','laporan_selesai'));
    }
}
