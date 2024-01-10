<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Tanaman as ModelTanaman;
use App\Models\Employee;

class Tanaman extends BaseController
{
    private function createResponse($status, $icon, $title, $text)
    {
        return $this->response->setJSON([
            'status' => $status,
            'icon' => $icon,
            'title' => $title,
            'text' => $text,
        ]);
    }

    public function index()
    {
        $model = new ModelTanaman();
        if ($this->request->getMethod(true) === 'POST') {
            $data = [
                'nama_tanaman' => $this->request->getVar('nama_tanaman'),
            ];
    
            if ($model->insert($data)) {
                return $this->createResponse(true, 'success', 'Success', 'berhasil membuat tanaman.');
            } else {
                return $this->createResponse(false, 'error', 'Failed', 'gagal membuat tanaman.');
            }
        }

        return view('pages/dashboard/tanaman/index', [
            'data' => $model->findAll(),
            'title' => 'Data Tanaman'
        ]);
    }

    public function edit($id)
    {
        $model = new ModelTanaman();
        if ($this->request->getMethod(true) === 'POST') {
            $data = [
                'nama_tanaman' => $this->request->getVar('nama_tanaman'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
    
            if ($model->update($id, $data)) {
                return $this->createResponse(true, 'success', 'Success', 'Tanaman telah diupdate.');
            } else {
                return $this->createResponse(false, 'error', 'Failed', 'Tanaman gagal diupdate.');
            }
        }

        return $this->response->setJSON([
            'data' => $model->where('id', $id)->first(),
        ]);
    }

    public function delete($id)
    {
        $modelTanaman = new ModelTanaman();
        $modelEmployee = new Employee();
    
        if ($modelEmployee->where('nama_ks', $id)->countAllResults() > 0) {
            return $this->createResponse(false, 'error', 'Failed', 'Tanaman tidak dapat dihapus karena terkait dengan progres.');
        }
    
        if (!$modelTanaman->where('id', $id)->delete()) {
            return $this->createResponse(false, 'error', 'Failed', 'Gagal menghapus tanaman.');
        }
    
        return $this->createResponse(true, 'success', 'Success', 'Berhasil menghapus tanaman.');
    }
    
}
