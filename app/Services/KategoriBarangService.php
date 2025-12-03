<?php

namespace App\Services;

use App\Repositories\Contracts\KategoriBarangRepositoryInterface;

class KategoriBarangService
{
    protected $repo;

    public function __construct(KategoriBarangRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function all()
    {
        return $this->repo->getAll();
    }

    public function findById($id)
    {
        return $this->repo->findById($id);
    }

    public function store($data)
    {
        return $this->repo->create($data);
    }

    public function update($id, $data)
    {
        return $this->repo->update($id, $data);
    }

    public function delete($id)
    {
        return $this->repo->delete($id);
    }
}
