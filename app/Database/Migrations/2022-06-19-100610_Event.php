<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Event extends Migration
{
    public function up()
    {
        $fields = [
            'id' => [
                'type' => 'VARCHAR',
                'constraint' => 5,
                'unique' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'date_start' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'date_end' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'recurs' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'max_recurs' => [
                'type' => 'INT',
                'null' => true,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'ticket_price' => [
                'type' => 'INT',
                'null' => true,
                'default' => 0
            ],
            'contact_person' => [
                'type' => 'VARCHAR',
                'constraint' => 13,
                'null' => true,
            ],
            'category_id' => [
                'type' => 'VARCHAR',
                'constraint' => 5,
                'null' => true,
            ],
            'owner' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true
            ],
            'geom' => [
                'type' => 'GEOMETRY',
                'null' => true,
            ],
            'video_url' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ];

        $this->db->disableForeignKeyChecks();
        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('category_id', 'category_event', 'id', 'CASCADE', 'SET NULL');
        $this->forge->addForeignKey('owner', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('event');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('event');
    }
}
