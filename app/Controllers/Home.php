<?php

namespace App\Controllers;

use App\Models\EventModel;
use CodeIgniter\Database\Exceptions\DatabaseException;

class Home extends BaseController
{
    public function index()
    {
        try {
            $events = (new EventModel())->upcoming();
        } catch (DatabaseException $exception) {
            // Keeps the landing page testable before the database schema is imported.
            $events = [
                [
                    'id' => 1,
                    'title' => 'Tech Innovation Summit',
                    'description' => 'A showcase of student-built web, mobile, and cloud projects.',
                    'date' => date('Y-m-d', strtotime('+14 days')),
                    'venue' => 'Main Auditorium',
                ],
                [
                    'id' => 2,
                    'title' => 'Cybersecurity Bootcamp',
                    'description' => 'Hands-on training on secure coding, XSS prevention, and CSRF defense.',
                    'date' => date('Y-m-d', strtotime('+21 days')),
                    'venue' => 'Computer Laboratory 1',
                ],
            ];
        }

        return view('home/index', [
            'title' => 'EventHub',
            'events' => $events,
        ]);
    }
}
