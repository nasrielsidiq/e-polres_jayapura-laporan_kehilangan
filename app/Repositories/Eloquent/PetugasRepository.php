<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\PetugasRepositoryInterface;

class PetugasRepository implements PetugasRepositoryInterface
{
    public function getAll()
    {
        return User::role(['petugas', 'admin'])->latest()->get();
    }

    public function findById($id)
    {
        return User::role(['petugas', 'admin'])->findOrFail($id);
    }

    public function create(array $data)
    {
        $user = User::create($data);
        $user->assignRole($data['role']);
        return $user;
    }

    public function update($id, array $data)
    {
        $user = $this->findById($id);
        $user->update($data);
        if (isset($data['role'])) {
            $user->syncRoles([$data['role']]);
        }
        return $user;
    }

    public function delete($id)
    {
        $user = $this->findById($id);
        return $user->delete();
    }
}
