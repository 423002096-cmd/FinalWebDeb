<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPerformanceIndexes extends Migration
{
    public function up()
    {
        // These indexes support admin search, pagination ordering, and attendee-event joins.
        $this->db->query('CREATE INDEX idx_attendees_fullname ON attendees(fullname)');
        $this->db->query('CREATE INDEX idx_attendees_email ON attendees(email)');
        $this->db->query('CREATE INDEX idx_attendees_course ON attendees(course)');
        $this->db->query('CREATE INDEX idx_attendees_created_at ON attendees(created_at)');
        $this->db->query('CREATE INDEX idx_attendees_event_id ON attendees(event_id)');
    }

    public function down()
    {
        $this->db->query('DROP INDEX idx_attendees_fullname ON attendees');
        $this->db->query('DROP INDEX idx_attendees_email ON attendees');
        $this->db->query('DROP INDEX idx_attendees_course ON attendees');
        $this->db->query('DROP INDEX idx_attendees_created_at ON attendees');
        $this->db->query('DROP INDEX idx_attendees_event_id ON attendees');
    }
}
