<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class Auth extends BaseController
{
    private function setSession($data)
    {
        return session()->set([
            'isLoggedIn' => TRUE,
            'id' => $data['id'],
            'name' => $data['name'],
            'username' => $data['username'],
            'role' => $data['role'],
            'profile' => $data['profile'],
        ]);
    }

    public function index()
    {
        if ($this->request->getMethod(true) == 'POST') {
            $model = new User();
            
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            
            $checkPointUsername = $model->where('username', $username)->first();
            if (!$checkPointUsername) {
                return $this->response->setJSON([
                    'status' => false,
                    'icon' => 'error',
                    'title' => 'Error!',
                    'text' => 'Username tidak ada di database.'
                ]);
            }

            if (password_verify($password, $checkPointUsername['password'])) {
                $this->setSession($checkPointUsername);
                return $this->response->setJSON([
                    'status' => true,
                    'icon' => 'success',
                    'title' => 'Success!',
                    'text' => 'Sign in berhasil.',
                    'role' => $checkPointUsername['role']
                ]);
            }

            return $this->response->setJSON([
                'status' => false,
                'icon' => 'error',
                'title' => 'Error!',
                'text' => 'Password salah!'
            ]);
        }

        $data = [
            'title' => 'Login'
        ];

        return view('pages/auth/SignIn', $data);
    }

    public function Logout()
    {
        session()->destroy();
        return $this->response->setJSON([
            'status' => true,
            'icon' => 'success',
            'title' => 'Success!',
            'text' => 'Logout berhasil.'
        ]);
    }
}
