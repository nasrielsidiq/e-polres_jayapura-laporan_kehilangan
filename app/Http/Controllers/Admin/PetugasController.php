<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PetugasRequest;
use App\Services\PetugasService;

class PetugasController extends Controller
{
    protected $service;

    public function __construct(PetugasService $service)
    {
        $this->middleware('role:admin');
        $this->service = $service;
    }

    public function index()
    {
        $data = $this->service->all();
        return view('admin.petugas.index', compact('data'));
    }

    public function create()
    {
        return view('admin.petugas.create');
    }

    public function store(PetugasRequest $request)
    {
        $data = $request->validated();

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        $this->service->store($data);

        return redirect()->route('admin.petugas.index')
            ->with('success', 'Petugas berhasil ditambahkan');
    }

    public function edit($id)
    {
        $petugas = $this->service->findById($id);
        return view('admin.petugas.edit', compact('petugas'));
    }

    public function update(PetugasRequest $request, $id)
    {
        $data = $request->validated();

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $this->service->update($id, $data);

        return redirect()->route('admin.petugas.index')
            ->with('success', 'Petugas berhasil diperbarui');
    }

    public function destroy($id)
    {
        $this->service->delete($id);

        return redirect()->route('admin.petugas.index')
            ->with('success', 'Petugas berhasil dihapus');
    }
}
