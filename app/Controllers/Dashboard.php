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
        if ($this->request->getMethod(true) === 'POST') {

        }

        return view('pages/dashboard/profile');
    }

    public function changePassword($id)
    {

    }
}
