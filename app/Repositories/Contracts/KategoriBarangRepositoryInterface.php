<?php

namespace App\Repositories\Contracts;

interface KategoriBarangRepositoryInterface
{
    public function getAll();
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function findById($id);
}
