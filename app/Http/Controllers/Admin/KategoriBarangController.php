<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KategoriBarangRequest;
use App\Services\KategoriBarangService;

class KategoriBarangController extends Controller
{
    protected $service;

    public function __construct(KategoriBarangService $service)
    {
        $this->middleware('role:admin|petugas');
        $this->service = $service;
    }

    public function index()
    {
        $data = $this->service->all();
        return view('admin.kategori.index', compact('data'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(KategoriBarangRequest $request)
    {
        try {
            $this->service->store($request->validated());
            return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil ditambahkan');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Gagal menambahkan kategori']);
        }
    }

    public function edit($id)
    {
        try {
            $kategori = $this->service->findById($id);
            return view('admin.kategori.edit', compact('kategori'));
        } catch (\Exception $e) {
            return redirect()->route('admin.kategori.index')->withErrors(['error' => 'Kategori tidak ditemukan']);
        }
    }

    public function update(KategoriBarangRequest $request, $id)
    {
        try {
            $this->service->update($id, $request->validated());
            return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil diperbarui');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Gagal memperbarui kategori']);
        }
    }

    public function destroy($id)
    {
        try {
            $this->service->delete($id);
            return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil dihapus');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Gagal menghapus kategori']);
        }
    }
}
