<?php

namespace App\Controllers;

use App\Models\AttendeeModel;
use App\Models\EventModel;

class AdminController extends BaseController
{
    public function dashboard()
    {
        $attendees = new AttendeeModel();
        $events = new EventModel();

        return view('admin/dashboard', [
            'title' => 'Admin Dashboard',
            'totalAttendees' => $attendees->countAllResults(),
            'totalEvents' => $events->countAllResults(),
            'registrationsToday' => (new AttendeeModel())->registrationsToday(),
        ]);
    }

    public function attendees()
    {
        
        $search = trim((string) $this->request->getGet('q'));
        $model = new AttendeeModel();
        $attendees = $model->searchable($search)->paginate(5, 'attendees');

        return view('admin/attendees', [
            'title' => 'Attendee Management',
            'attendees' => $attendees,
            'pager' => $model->pager,
            'search' => $search,
            'total' => (new AttendeeModel())->searchable($search)->countAllResults(),
            'currentPage' => (int) ($this->request->getGet('page_attendees') ?? 1),
        ]);
    }

    public function deleteAttendee(int $id)
    {
        $model = new AttendeeModel();
        $attendee = $model->find($id);

        if ($attendee) {
            $model->delete($id);
            $file = WRITEPATH . 'uploads/' . $attendee['image'];
            if (is_file($file)) {
                @unlink($file);
            }
        }

        return redirect()->back()->with('success', 'Attendee deleted successfully.');
    }

    public function image(string $filename)
    {
        $path = WRITEPATH . 'uploads/' . basename($filename);

        if (! is_file($path)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Image not found.');
        }

        return $this->response->setHeader('Content-Type', mime_content_type($path))->setBody(file_get_contents($path));
    }
}
