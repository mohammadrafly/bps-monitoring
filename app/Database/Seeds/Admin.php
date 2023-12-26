<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\User;
use DateTime;

class Admin extends Seeder
{
    public function run()
    {
        $model = new User();
        $data = [
            'name' => 'Administrator',
            'username' => 'admin',
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
            'role' => 'admin',
        ];
        $model->insert($data);
    }
}
