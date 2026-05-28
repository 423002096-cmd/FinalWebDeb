<?php

namespace App\Models;

use CodeIgniter\Model;

class AttendeeModel extends Model
{
    protected $table = 'attendees';
    protected $primaryKey = 'id';
    protected $allowedFields = ['fullname', 'email', 'contact', 'course', 'image', 'event_id'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function perPageLimit(): int
    {
        return 5;
    }

    public function searchable(?string $search = null): self
    {
        // select() keeps the query lean for the paginated admin table.
        $this->select('attendees.id, attendees.fullname, attendees.email, attendees.contact, attendees.course, attendees.image, attendees.created_at, events.title AS event_title')
            ->join('events', 'events.id = attendees.event_id', 'left')
            ->orderBy('attendees.created_at', 'DESC');

        if ($search) {
            $this->groupStart()
                ->like('attendees.fullname', $search)
                ->orLike('attendees.email', $search)
                ->orLike('attendees.course', $search)
                ->groupEnd();
        }

        return $this;
    }

    public function registrationsToday(): int
    {
        return $this->where('DATE(created_at)', date('Y-m-d'))->countAllResults();
    }
}
