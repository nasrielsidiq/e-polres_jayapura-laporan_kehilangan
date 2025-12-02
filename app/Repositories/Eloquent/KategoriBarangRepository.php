<?php

namespace App\Repositories\Eloquent;

use App\Models\KategoriBarang;
use App\Repositories\Contracts\KategoriBarangRepositoryInterface;

class KategoriBarangRepository implements KategoriBarangRepositoryInterface
{
    public function getAll()
    {
        return KategoriBarang::latest()->get();
    }

    public function findById($id)
    {
        return KategoriBarang::findOrFail($id);
    }

    public function create(array $data)
    {
        return KategoriBarang::create($data);
    }

    public function update($id, array $data)
    {
        $cat = $this->findById($id);
        $cat->update($data);
        return $cat;
    }

    public function delete($id)
    {
        return KategoriBarang::destroy($id);
    }
}
