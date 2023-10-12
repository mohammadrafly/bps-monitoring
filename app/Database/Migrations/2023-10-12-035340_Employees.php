<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Employees extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_ks' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nama_petugas' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'target' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'realisasi' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'total_absolut' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('employee');
    }

    public function down()
    {
        $this->forge->dropTable('employee');
    }
}
