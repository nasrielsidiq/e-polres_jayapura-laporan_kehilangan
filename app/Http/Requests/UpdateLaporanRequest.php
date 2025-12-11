<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLaporanRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_kategori_barang' => 'required|exists:kategori_barangs,id_kategori',
            'nama_barang' => 'required|string|max:255',
            'deskripsi_barang' => 'required|string',
            'lokasi_kehilangan' => 'required|string|max:255',
            'tanggal_lapor' => 'required|date',
            'waktu_kehilangan' => 'nullable|date_format:H:i',
            'kronologi' => 'nullable|string',
        ];
    }
}