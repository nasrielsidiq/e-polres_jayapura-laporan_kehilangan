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
        $laporan_pending = \App\Models\LaporanKehilangan::where('status','submitted')->count();
        $laporan_selesai = \App\Models\LaporanKehilangan::where('status','done')->count();
        $laporan_found = \App\Models\LaporanKehilangan::where('status','found')->count();
        $laporan_rejected = \App\Models\LaporanKehilangan::where('status','rejected')->count();
        $laporan_verified = \App\Models\LaporanKehilangan::where('status','verified')->count();
        $laporan_processing = \App\Models\LaporanKehilangan::where('status','processing')->count();
        
        $total_pelapor = \App\Models\User::role('pelapor')->count();
        $total_petugas = \App\Models\User::role('petugas')->count();
        $total_admin = \App\Models\User::role('admin')->count();
        
        // Data untuk chart per bulan
        $chartData = [];
        for ($i = 11; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $month = $date->format('Y-m');
            $chartData['months'][] = $date->format('M Y');
            $chartData['total'][] = \App\Models\LaporanKehilangan::
                whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
            $chartData['done'][] = \App\Models\LaporanKehilangan::where('status', 'done')
                ->whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
            $chartData['found'][] = \App\Models\LaporanKehilangan::where('status', 'found')
                ->whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
            $chartData['rejected'][] = \App\Models\LaporanKehilangan::where('status', 'rejected')
                ->whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
        }
        
        return view('admin.dashboard', compact(
            'total_laporan','laporan_pending','laporan_selesai','laporan_found','laporan_rejected',
            'laporan_verified','laporan_processing','total_pelapor','total_petugas','total_admin','chartData'
        ));
    }
}
