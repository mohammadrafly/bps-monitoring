<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Employee as EmployeeModel;

class Employee extends BaseController
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
        $model = new EmployeeModel();
        if ($this->request->getMethod(true) === 'POST') {
            $data = [
                'nama_ks' => $this->request->getVar('nama_ks'),
                'nama_petugas' => $this->request->getVar('nama_petugas'),
                'target' => $this->request->getVar('target'),
                'realisasi' => $this->request->getVar('realisasi'),
                'total_absolut' => $this->request->getVar('total_absolut'),
            ];
    
            if ($model->insert($data)) {
                return $this->createResponse(true, 'success', 'Success', 'berhasil membuat employee.');
            } else {
                return $this->createResponse(false, 'error', 'Failed', 'gagal membuat employee.');
            }
        }

        return view('pages/dashboard/employee/index', [
            'data' => $model->findAll(),
            'title' => 'Data Employee'
        ]);
    }

    public function edit($id)
    {
        $model = new EmployeeModel();
        if ($this->request->getMethod(true) === 'POST') {
            $data = [
                'nama_ks' => $this->request->getVar('nama_ks'),
                'nama_petugas' => $this->request->getVar('nama_petugas'),
                'target' => $this->request->getVar('target'),
                'realisasi' => $this->request->getVar('realisasi'),
                'total_absolut' => $this->request->getVar('total_absolut'),
            ];
    
            if ($model->update($id, $data)) {
                return $this->createResponse(true, 'success', 'Success', 'Employee telah diupdate.');
            } else {
                return $this->createResponse(false, 'error', 'Failed', 'Employee gagal diupdate.');
            }
            
        }

        return $this->response->setJSON([
            'data' => $model->where('id', $id)->first(),
        ]);
    }

    public function delete($id)
    {
        $model = new EmployeeModel();
        if (! $model->where('id', $id)->delete($id)) {
            return $this->createResponse(true, 'error', 'Failed', 'gagal menghapus employee.');
        } 
        return $this->createResponse(true, 'success', 'Success', 'berhasil menghapus employee.');
    }
}
