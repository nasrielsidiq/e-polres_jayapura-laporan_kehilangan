<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KategoriBarangRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_kategori' => 'required|string|max:255',
            'deskripsi'     => 'nullable|string',
        ];
    }

    public function attributes()
    {
        return [
            'nama_kategori' => 'nama kategori',
            'deskripsi'     => 'deskripsi',
        ];
    }
}
