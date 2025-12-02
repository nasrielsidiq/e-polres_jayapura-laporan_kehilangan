<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLaporanRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nomor_laporan' => 'nullable|string|max:50',
            'id_kategori_barang' => 'required|exists:kategori_barangs,id_kategori',
            'nama_barang' => 'required|string|max:255',
            'deskripsi_barang' => 'required|string',
            'lokasi_kehilangan' => 'required|string|max:255',
            'waktu_kehilangan' => 'nullable|date',
            'kronologi' => 'nullable|string',
            'lampiran.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120'
        ];
    }
}