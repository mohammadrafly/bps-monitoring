<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\Tanaman;
use App\Models\User;

class Dummy extends Seeder
{
    public function run()
    {
        $model = new Tanaman();
        $user = new User();
        $allRecords = $model->findAll();
        $allOperators = $user->where('role', 'operator')->findAll();
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            if (!empty($allRecords)) {
                $randomIndex = array_rand($allRecords);
                $randomRecord = $allRecords[$randomIndex];
                $randomId = $randomRecord['id'];
            } else {
                echo 'No records found.';
            }

            $createdAt = $faker->dateTimeBetween('-14 days', 'now')->format('Y-m-d H:i:s');

            $randomOperator = $allOperators[array_rand($allOperators)];

            $data = [
                'nama_ks'         => $randomId,
                'id_operator'     => $randomOperator['id'],
                'target'          => 100,
                'realisasi'       => random_int(1, 100),
                'total_absolut'   => 0,
                'created_at'      => $createdAt,
            ];

            $data['total_absolut'] = $data['target'] + $data['realisasi'];

            $this->db->table('progres')->insert($data);
        }
    }
}
