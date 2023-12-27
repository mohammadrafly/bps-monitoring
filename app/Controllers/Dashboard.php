<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Employee;
use App\Models\User;

class Dashboard extends BaseController
{
    public function index()
    {
        $user = New User();
        $employee = new Employee();
        return view('pages/dashboard/index', [
        //dd([
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
            $model->update($id, [
                'name' => $this->request->getVar('name'),
                'username' => $this->request->getVar('username'),
            ]);

            return redirect()->to('dashboard/profile/update/'.$id)->with('success', 'Berhasil update data profile');
        }

        return view('pages/dashboard/profile', [
            'data' => $model->where('id', $id)->first()
        ]);
    }

    public function changePassword($id)
    {

    }
}
