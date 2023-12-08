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
            'user' => $user->countAll(),
            'data' => $employee->findAll(),
            'employee' => $employee->countAll()
        ]);
    }
}
