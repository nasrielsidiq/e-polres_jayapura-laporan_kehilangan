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
        return [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $this->id,
            'password' => $this->isMethod('post') ? 'required|min:6' : 'nullable|min:6',
            'phone'    => 'nullable|string|max:20',
            'role'     => 'required|in:admin,petugas',
        ];
    }
}
