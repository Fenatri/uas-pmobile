<?php

namespace App\Models;

use CodeIgniter\Model;

class Biaya extends Model
{
    protected $table            = 'biaya';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['nis_siswa','nominal','berita'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Function to get biaya with related siswa data
    public function getBiayaWithSiswa()
    {
        return $this->select('biaya.*, siswa.nama_siswa')
                    ->join('siswa', 'siswa.nis = biaya.nis_siswa')
                    ->findAll();
    }

    public function getBiayaWithSiswaByNis($nis_siswa)
    {
        return $this->select('biaya.*, siswa.nama_siswa')
                    ->join('siswa', 'siswa.nis = biaya.nis_siswa')
                    ->where('biaya.nis_siswa', $nis_siswa)
                    ->findAll();
    }
    
    public function getBiayaWithSiswaByTanggal($tanggal)
    {
    return $this->select('biaya.id, biaya.tanggal, biaya.nis_siswa,
                          siswa.nama_siswa, biaya.nominal, biaya.berita')
                ->join('siswa', 'siswa.nis = biaya.nis_siswa')
                ->where('DATE(biaya.tanggal)', $tanggal)
                ->orderBy('biaya.id', 'DESC')
                ->findAll();
    }
}
