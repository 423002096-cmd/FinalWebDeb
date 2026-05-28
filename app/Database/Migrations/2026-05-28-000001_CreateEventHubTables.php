<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEventHubTables extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 120],
            'email' => ['type' => 'VARCHAR', 'constraint' => 150, 'unique' => true],
            'password' => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ])->addKey('id', true)->createTable('users');

        $this->forge->addField([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'title' => ['type' => 'VARCHAR', 'constraint' => 180],
            'description' => ['type' => 'TEXT'],
            'date' => ['type' => 'DATE'],
            'venue' => ['type' => 'VARCHAR', 'constraint' => 180],
        ])->addKey('id', true)->createTable('events');

        $this->forge->addField([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'fullname' => ['type' => 'VARCHAR', 'constraint' => 120],
            'email' => ['type' => 'VARCHAR', 'constraint' => 150],
            'contact' => ['type' => 'VARCHAR', 'constraint' => 30],
            'course' => ['type' => 'VARCHAR', 'constraint' => 120],
            'image' => ['type' => 'VARCHAR', 'constraint' => 255],
            'event_id' => ['type' => 'INT', 'unsigned' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ])->addKey('id', true)
            ->addForeignKey('event_id', 'events', 'id', 'CASCADE', 'CASCADE')
            ->createTable('attendees');
    }

    public function down()
    {
        $this->forge->dropTable('attendees', true);
        $this->forge->dropTable('events', true);
        $this->forge->dropTable('users', true);
    }
}
