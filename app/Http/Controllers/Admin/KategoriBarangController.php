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
        $this->service->store($request->validated());
        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kategori = $this->service->repo->findById($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(KategoriBarangRequest $request, $id)
    {
        $this->service->update($id, $request->validated());
        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
}
