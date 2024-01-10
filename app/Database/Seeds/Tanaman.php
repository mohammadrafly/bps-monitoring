<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Tanaman extends Seeder
{
    public function run()
    {
        $tanamanOptions = ['Jagung', 'Padi', 'Jeruk', 'Apel'];

        $count = count($tanamanOptions);

        for ($i = 0; $i < 4; $i++) {
            $index = $i % $count;

            $data = [
                'nama_tanaman' => $tanamanOptions[$index],
            ];

            $this->db->table('tanaman')->insert($data);
        }
    }
}
