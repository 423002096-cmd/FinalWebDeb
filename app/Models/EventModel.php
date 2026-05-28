<?php

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'description', 'date', 'venue'];
    protected $useTimestamps = false;

    public function upcoming(int $limit = 6): array
    {
        return $this->select('id, title, description, date, venue')
            ->where('date >=', date('Y-m-d'))
            ->orderBy('date', 'ASC')
            ->limit($limit)
            ->findAll();
    }
}
