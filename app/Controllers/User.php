<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User as UserModel;

class User extends BaseController
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
        $model = new UserModel();
        if ($this->request->getMethod(true) === 'POST') {
            $data = [
                'name' => $this->request->getVar('name'),
                'role' => $this->request->getVar('role'),
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            ];
    
            if ($model->insert($data)) {
                return $this->createResponse(true, 'success', 'Success', 'berhasil membuat user.');
            } else {
                return $this->createResponse(false, 'error', 'Failed', 'gagal membuat user.');
            }
        }

        return view('pages/dashboard/users/index', [
            'data' => $model->where('id !=', session()->get('id'))->findAll(),
            'title' => 'Data User'
        ]);
    }

    public function edit($id)
    {
        $model = new UserModel();
        if ($this->request->getMethod(true) === 'POST') {
            $data = [
                'name' => $this->request->getVar('name'),
                'role' => $this->request->getVar('role'),
                'username' => $this->request->getVar('username'),
            ];
    
            if ($model->update($id, $data)) {
                return $this->createResponse(true, 'success', 'Success', 'User telah diupdate.');
            } else {
                return $this->createResponse(false, 'error', 'Failed', 'User gagal diupdate.');
            }
            
        }

        return $this->response->setJSON([
            'data' => $model->where('id', $id)->first(),
        ]);
    }

    public function delete($id)
    {
        $model = new UserModel();
        if (! $model->where('id', $id)->delete($id)) {
            return $this->createResponse(true, 'error', 'Failed', 'gagal menghapus user.');
        } 
        return $this->createResponse(true, 'success', 'Success', 'berhasil menghapus user.');
    }
}
