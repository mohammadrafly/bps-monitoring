<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\User as UserModel;

class User extends Seeder
{
    public function run()
    {
        $model = new UserModel();

        $userData = [
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'role' => 'admin',
            ],
            [
                'name' => 'User1',
                'username' => 'user1',
                'password' => password_hash('user1123', PASSWORD_DEFAULT),
                'role' => 'operator',
            ],
            [
                'name' => 'User2',
                'username' => 'user2',
                'password' => password_hash('user2123', PASSWORD_DEFAULT),
                'role' => 'operator',
            ],
        ];

        $model->insertBatch($userData);
    }
}
