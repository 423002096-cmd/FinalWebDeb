<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EventHubSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('users')->insert([
            'name' => 'EventHub Admin',
            'email' => 'admin@eventhub.test',
            'password' => password_hash('Admin@123', PASSWORD_DEFAULT),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $this->db->table('events')->insertBatch([
            ['title' => 'Tech Innovation Summit', 'description' => 'A showcase of student-built web, mobile, and cloud projects.', 'date' => date('Y-m-d', strtotime('+14 days')), 'venue' => 'Main Auditorium'],
            ['title' => 'Cybersecurity Bootcamp', 'description' => 'Hands-on training on secure coding, XSS prevention, and CSRF defense.', 'date' => date('Y-m-d', strtotime('+21 days')), 'venue' => 'Computer Laboratory 1'],
            ['title' => 'Startup Pitch Night', 'description' => 'Students pitch IT solutions to mentors and invited industry guests.', 'date' => date('Y-m-d', strtotime('+30 days')), 'venue' => 'Innovation Hub'],
            ['title' => 'Cloud Deployment Workshop', 'description' => 'A guided session on deploying PHP applications to shared hosting.', 'date' => date('Y-m-d', strtotime('+40 days')), 'venue' => 'AVR Room'],
        ]);
    }
}
