<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Employee;
use App\Models\User;

class Dashboard extends BaseController
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
        $user = New User();
        $employee = new Employee();
        return view('pages/dashboard/index', [
            'user' => $user->countAll(),
            'data' => $employee->getDataThisWeek()->get()->getResultArray(),
            'employee' => $employee->countAll(),
            'getTotalLastWeek' => $employee->getTotalLastWeek(),
            'getTotalThisWeek' => $employee->getTotalThisWeek(),
            'persen' => $employee->getPercentageSurplus(),
            'chartData' => $employee->getDataForLast7Days()
        ]);
    }

    public function profile($id)
    {
        $model = new User();
        if ($this->request->getMethod(true) === 'POST') {
            $profileImage = $this->request->getFile('profile');

            if ($profileImage->isValid() && !$profileImage->hasMoved()) {
                $newName = $profileImage->getRandomName();
                $profileImage->move('./profile/', $newName);
        
                $model->update($id, [
                    'name' => $this->request->getVar('name'),
                    'username' => $this->request->getVar('username'),
                    'profile' => $newName, 
                ]);
            } else {
                $model->update($id, [
                    'name' => $this->request->getVar('name'),
                    'username' => $this->request->getVar('username'),
                ]);
            }

            return redirect()->to('dashboard/profile/update/'.$id)->with('success', 'Berhasil update data profile, silahakan login ulang');
        }

        return view('pages/dashboard/profile', [
            'data' => $model->where('id', $id)->first()
        ]);
    }

    public function changePassword($id)
    {
        $model = new User();
        
        if ($this->request->getMethod(true) === 'POST') {
            $checkpoint = $model->where('id', $id)->first();
            
            if (!$checkpoint) {
                return $this->createResponse(false, 'error', 'Failed', 'User not found');
            }
        
            $old_password = $this->request->getVar('old_password');
            $new_password = $this->request->getVar('new_password');
        
            if (password_verify($old_password, $checkpoint['password'])) {
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                
                $model->update($id, [
                    'password' => $hashed_password
                ]);
        
                return $this->createResponse(true, 'success', 'Success', 'Password changed successfully.');
            } else {
                return $this->createResponse(false, 'error', 'Failed', 'Incorrect old password.');
            }
        }
        
    }
}
