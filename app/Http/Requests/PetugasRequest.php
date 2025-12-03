<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetugasRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $userId = $this->route('petugas');
        return [
            'nama_lengkap' => 'required|string|max:255',
            'email'        => 'required|email|unique:users,email,' . $userId . ',id_user',
            'no_hp'        => 'nullable|string|max:20|unique:users,no_hp,' . $userId . ',id_user',
            'password'     => $this->isMethod('post') ? 'required|min:6' : 'nullable|min:6',
            'role'         => 'required|in:admin,petugas',
        ];
    }

    public function attributes()
    {
        return [
            'nama_lengkap' => 'nama lengkap',
            'no_hp'        => 'nomor HP',
            'role'         => 'peran',
        ];
    }
}
