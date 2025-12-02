<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LaporanKehilangan;

class ArsipController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin|petugas');
    }

    /**
     * Menampilkan daftar laporan yang sudah diarsipkan (status: selesai/ditemukan)
     */
    public function index()
    {
        $query = LaporanKehilangan::whereIn('status', ['selesai', 'ditemukan', 'ditutup']);

        // Filter berdasarkan status
        if (request('status')) {
            $query->where('status', request('status'));
        }

        // Search berdasarkan nomor laporan atau nama pelapor
        if (request('search')) {
            $search = request('search');
            $query->where(function ($q) use ($search) {
                $q->where('nomor_laporan', 'like', "%{$search}%")
                  ->orWhereHas('pelapor', function ($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                  });
            });
        }

        $arsip = $query->latest()->get();

        return view('admin.arsip.index', compact('arsip'));
    }

    /**
     * Menampilkan detail laporan arsip
     */
    public function show($id)
    {
        $arsip = LaporanKehilangan::whereIn('status', ['selesai', 'ditemukan', 'ditutup'])
            ->findOrFail($id);

        return view('admin.arsip.show', compact('arsip'));
    }

    /**
     * Kembalikan laporan arsip menjadi status aktif
     */
    public function restore($id)
    {
        $laporan = LaporanKehilangan::findOrFail($id);

        $laporan->update([
            'status' => 'diproses'
        ]);

        return redirect()->route('admin.arsip.index')
            ->with('success', 'Laporan berhasil dipulihkan ke daftar aktif.');
    }

    /**
     * Hapus permanen arsip
     */
    public function destroy($id)
    {
        $laporan = LaporanKehilangan::findOrFail($id);
        $laporan->delete();

        return redirect()->route('admin.arsip.index')
            ->with('success', 'Arsip berhasil dihapus permanen.');
    }
}
