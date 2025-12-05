<?php
namespace App\Services;

use App\Repositories\LaporanRepository;
use App\Models\RiwayatProses;
use Illuminate\Http\UploadedFile;
use App\Services\LogService;
use Carbon\Carbon;

class LaporanService
{
    protected $repo;
    protected $logService;

    public function __construct(LaporanRepository $repo, LogService $logService)
    {
        $this->repo = $repo;
        $this->logService = $logService;
    }

    public function createLaporan(array $data, $user)
    {
        $data['id_user'] = $user->id_user;

        // Set tanggal_lapor to current date if not provided
        if (!isset($data['tanggal_lapor'])) {
            $data['tanggal_lapor'] = now()->format('Y-m-d');
        }

        // Combine tanggal_lapor + waktu_kehilangan into proper datetime format
        if (isset($data['tanggal_lapor']) && isset($data['waktu_kehilangan'])) {
            $data['waktu_kehilangan'] = $data['tanggal_lapor'] . ' ' . $data['waktu_kehilangan'] . ':00';
        } elseif (isset($data['tanggal_lapor'])) {
            $data['waktu_kehilangan'] = $data['tanggal_lapor'] . ' 00:00:00';
        }

        $lap = $this->repo->create($data);

        // initial riwayat
        RiwayatProses::create([
            'id_laporan' => $lap->id_laporan,
            'id_petugas' => null,
            'status' => 'Menunggu',
            'catatan' => 'Laporan dibuat oleh pelapor',
            'waktu' => now(),
        ]);

        $this->logService->log($user->id_user, "Membuat laporan {$lap->nomor_laporan}");

        return $lap;
    }

    public function uploadLampiran($laporan, UploadedFile $file, $collection = 'lampiran', $user = null)
    {
        $laporan->addMedia($file)->toMediaCollection($collection, 'public');

        if($user){
            $this->logService->log($user->id_user, "Mengunggah lampiran ke {$laporan->nomor_laporan}");
        }
        return $laporan;
    }

    public function verify($id, $verifikatorId, $status = 'Diverifikasi', $catatan = null)
    {
        $lap = $this->repo->updateStatus($id, $status, [
            'verified_by' => $verifikatorId,
            'verified_at' => now(),
        ]);

        RiwayatProses::create([
            'id_laporan' => $lap->id_laporan,
            'id_petugas' => $verifikatorId,
            'status' => $status,
            'catatan' => $catatan ?? 'Diverifikasi oleh petugas',
            'waktu' => now(),
        ]);

        $this->logService->log($verifikatorId, "Diverifikasi laporan {$lap->nomor_laporan}");
        return $lap;
    }

    public function updateStatus($id, $petugasId, $status, $catatan = null)
    {
        $lap = $this->repo->updateStatus($id, $status, [
            'selesai_at' => $status === 'done' | $status === 'found' ? now() : null,
        ]);

        RiwayatProses::create([
            'id_laporan' => $lap->id_laporan,
            'id_petugas' => $petugasId,
            'status' => $status,
            'catatan' => $catatan,
            'waktu' => now(),
        ]);

        $this->logService->log($petugasId, "Mengubah status {$lap->nomor_laporan} => {$status}");
        return $lap;
    }
}
