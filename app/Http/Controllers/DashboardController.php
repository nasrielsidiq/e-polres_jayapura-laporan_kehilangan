<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LaporanKehilangan;
use App\Models\LogAktivitas;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if($user->hasRole('admin') || $user->hasRole('petugas')){
            return redirect()->route('admin.dashboard');
        }
        // Get user's laporan statistics
        $totalLaporan = $user->laporan()->count();
        $menunggu = $user->laporan()->where('status', 'pending')->count();
        $terverifikasi = $user->laporan()->where('status', 'verified')->count();
        $selesai = $user->laporan()->where('status', 'selesai')->count();

        // Get 5 most recent laporan
        $recentLaporan = $user->laporan()
            ->with('kategori')
            ->orderByDesc('tanggal_lapor')
            ->limit(5)
            ->get();

        // Get activity logs for this user (last 10)
        $activityLogs = LogAktivitas::where('id_user', $user->id_user)
            ->orderByDesc('created_at')
            ->limit(10)
            ->get();

        return view('dashboard', compact(
            'totalLaporan',
            'menunggu',
            'terverifikasi',
            'selesai',
            'recentLaporan',
            'activityLogs'
        ));
    }
}
