<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Dummy extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            $data = [
                'nama_ks'         => $faker->userName,
                'nama_petugas'    => $faker->name,
                'target'          => 100,
                'realisasi'       => random_int(1, 100),
                'total_absolut'   => 0,
            ];

            $data['total_absolut'] = $data['target'] + $data['realisasi'];

            $this->db->table('employee')->insert($data);
        }
    }
}
