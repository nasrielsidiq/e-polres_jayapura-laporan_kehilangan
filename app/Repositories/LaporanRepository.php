<?php
namespace App\Repositories;

use App\Models\LaporanKehilangan;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class LaporanRepository
{
    protected $model;

    public function __construct(LaporanKehilangan $model)
    {
        $this->model = $model;
    }

    public function paginateAll($perPage = 15)
    {
        return $this->model->with(['user', 'kategori', 'verifikator'])->orderByDesc('tanggal_lapor')->paginate($perPage);
    }

    public function findById($id)
    {
        return $this->model->with(['user','kategori','riwayat','verifikator'])->findOrFail($id);
    }

    public function findByNomor($nomor)
    {
        return $this->model->where('nomor_laporan', $nomor)->with(['user','kategori','riwayat'])->first();
    }

    public function create(array $data)
    {
        // nomor otomatis: LP-YYYY-00001
        $data['nomor_laporan'] = $this->generateNomor();
        return $this->model->create($data);
    }

    public function updateStatus($id, $status, $additional = [])
    {
        $lap = $this->model->findOrFail($id);
        $lap->status = $status;
        if(isset($additional['verified_by'])) $lap->verified_by = $additional['verified_by'];
        if(isset($additional['verified_at'])) $lap->verified_at = $additional['verified_at'];
        if(isset($additional['selesai_at'])) $lap->selesai_at = $additional['selesai_at'];
        $lap->save();
        return $lap;
    }

    public function queryForDataTable(): Builder
    {
        return $this->model->with(['user', 'kategori'])->select('*');
    }

    protected function generateNomor()
    {
        $year = now()->format('Y');
        $count = $this->model->whereYear('tanggal_lapor', now()->year)->count() + 1;
        return sprintf('LP-%s-%05d', $year, $count);
    }
}
