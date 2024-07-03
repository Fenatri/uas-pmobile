<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Biaya extends Migration
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
            'tanggal' => [
                'type'    => 'DATETIME',
            ],
            'nis_siswa' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'nominal' => [
                'type'       => 'INT',
                'constraint' => 5,
            ],
            'bertita' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                
            ],

        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('nis_siswa', 'siswa', 'nis', 'CASCADE', '');
        $this->forge->createTable('biaya');
    }

    public function down()
    {
        $this->forge->dropTable('biaya');
    }
}
