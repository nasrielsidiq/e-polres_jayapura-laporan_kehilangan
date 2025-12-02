<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\PelaporRepositoryInterface;

class PelaporRepository implements PelaporRepositoryInterface
{
    public function getAll()
    {
        return User::role('pelapor')->latest()->get();
    }

    public function findById($id)
    {
        return User::role('pelapor')->findOrFail($id);
    }

    public function create(array $data)
    {
        $user = User::create($data);
        $user->assignRole('pelapor');
        return $user;
    }

    public function update($id, array $data)
    {
        $user = $this->findById($id);
        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        $user = $this->findById($id);
        return $user->delete();
    }
}
