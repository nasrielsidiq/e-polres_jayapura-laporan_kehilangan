<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaturan;

class PengaturanController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    /**
     * Tampilkan halaman pengaturan umum
     */
    public function index()
    {
        $settings = Pengaturan::all()->pluck('value', 'key')->toArray();

        return view('admin.pengaturan.index', compact('settings'));
    }

    /**
     * Update konfigurasi aplikasi
     */
    public function update(Request $request)
    {
        $request->validate([
            'app_name'      => 'required|string|max:255',
            'instansi'      => 'required|string|max:255',
            'alamat'        => 'nullable|string|max:500',
            'kontak'        => 'nullable|string|max:50',
            'logo'          => 'nullable|image|mimes:jpg,png,jpeg|max:1024'
        ]);

        $data = $request->only(['app_name', 'instansi', 'alamat', 'kontak']);

        foreach ($data as $key => $val) {
            Pengaturan::updateOrCreate(
                ['key' => $key],
                ['value' => $val]
            );
        }

        // Simpan logo aplikasi
        if ($request->hasFile('logo')) {
            $logoSetting = Pengaturan::updateOrCreate(
                ['key' => 'logo'],
                ['value' => null]
            );

            $logoSetting
                ->addMediaFromRequest('logo')
                ->toMediaCollection('logo');
        }

        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
