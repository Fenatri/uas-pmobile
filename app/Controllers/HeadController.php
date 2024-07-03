<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class HeadController extends ResourceController
{
    protected $modelName = 'App\Models\Biaya';
    protected $format    ='json';
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        //
        $data = [
            'message' => 'success',
            'data_biaya' => $this->model->orderBy('biaya.tanggal','DESC')->getBiayaWithSiswa()
        ];

        return $this->respond($data, 200);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($tanggal = null)
    {
        //
        if (!$tanggal) {
            return $this->failValidationErrors('Tanggal tidak disediakan');
        }
    
        // Format tanggal harus sesuai dengan 'yyyy-mm-dd'
        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $tanggal)) {
            return $this->failValidationErrors('Format tanggal harus yyyy-mm-dd');
        }
    
        // Ambil data berdasarkan tanggal
        $data = $this->model->getBiayaWithSiswaByTanggal($tanggal);
    
        // Cek apakah data ditemukan
        if (empty($data)) {
            return $this->failNotFound('Data not found for the given date');
        }
    
        return $this->respond($data, 200);
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }
}
