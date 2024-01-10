<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\Tanaman;

class Dummy extends Seeder
{
    public function run()
    {
        $model = new Tanaman();
        $allRecords = $model->findAll();
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

            $data = [
                'nama_ks'         => $randomId,
                'nama_petugas'    => $faker->name,
                'target'          => 100,
                'realisasi'       => random_int(1, 100),
                'total_absolut'   => 0,
                'created_at'      => $createdAt,
            ];

            $data['total_absolut'] = $data['target'] + $data['realisasi'];

            $this->db->table('employee')->insert($data);
        }
    }
}
