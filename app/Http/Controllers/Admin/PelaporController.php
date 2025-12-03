<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PelaporRequest;
use App\Services\PelaporService;

class PelaporController extends Controller
{
    protected $service;

    public function __construct(PelaporService $service)
    {
        $this->middleware('role:admin|petugas');
        $this->service = $service;
    }

    public function index()
    {
        $pelapor = $this->service->getAll();
        // dd($pelapor[0]); // Debugging line, remove in production
        return view('admin.pelapor.index', compact('pelapor'));
    }

    public function create()
    {
        return view('admin.pelapor.create');
    }

    public function store(PelaporRequest $request)
    {
        $data = $request->validated();
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        $this->service->store($data);

        return redirect()->route('admin.pelapor.index')
            ->with('success', 'Pelapor berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pelapor = $this->service->findById($id);
        return view('admin.pelapor.edit', compact('pelapor'));
    }

    public function update(PelaporRequest $request, $id)
    {
        $data = $request->validated();
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $this->service->update($id, $data);

        return redirect()->route('admin.pelapor.index')
            ->with('success', 'Pelapor berhasil diperbarui');
    }

    public function destroy($id)
    {
        $this->service->delete($id);

        return redirect()->route('admin.pelapor.index')
            ->with('success', 'Pelapor berhasil dihapus');
    }
}
