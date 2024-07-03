<?php

namespace App\Models;

use CodeIgniter\Model;

class Siswa extends Model
{
    protected $table            = 'siswa';
    protected $primaryKey       = 'nis';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [];


    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Function to get biaya with related siswa data
    public function getSiswaWithBiaya()
    {
        return $this->select('biaya.id, siswa.*, biaya.tanggal, biaya.nominal, biaya.berita')
                    ->join('biaya', 'biaya.nis_siswa = siswa.nis')
                    ->findAll();
    }
    public function getSiswaWithBiayaByNis($nis)
    {
        return $this->select('biaya.id, siswa.*, biaya.tanggal, biaya.nominal, biaya.berita')
                    ->join('biaya', 'biaya.nis_siswa = siswa.nis')
                    ->where('siswa.nis', $nis)
                    ->findAll();
    }
}