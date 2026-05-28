<?php

namespace App\Controllers;

use App\Models\AttendeeModel;
use App\Models\EventModel;

class RegistrationController extends BaseController
{
    public function create(int $eventId)
    {
        $event = (new EventModel())->find($eventId);

        if (! $event) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Event not found.');
        }

        return view('events/register', [
            'title' => 'Register for ' . $event['title'],
            'event' => $event,
            'validation' => service('validation'),
        ]);
    }

    public function store(int $eventId)
    {
        $event = (new EventModel())->find($eventId);

        if (! $event) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Event not found.');
        }

        $rules = [
            'fullname' => 'required|min_length[3]|max_length[120]',
            'email' => 'required|valid_email|max_length[150]',
            'contact' => 'required|min_length[7]|max_length[30]',
            'course' => 'required|max_length[120]',
            'profile_picture' => 'uploaded[profile_picture]|is_image[profile_picture]|mime_in[profile_picture,image/jpg,image/jpeg,image/png,image/webp]|max_size[profile_picture,2048]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $image = $this->request->getFile('profile_picture');
        $safeName = $image->getRandomName();

        // UploadedFile validates the upload and stores only approved image types in writable/uploads.
        $image->move(WRITEPATH . 'uploads', $safeName);

        $attendeeData = [
            'fullname' => $this->request->getPost('fullname'),
            'email' => $this->request->getPost('email'),
            'contact' => $this->request->getPost('contact'),
            'course' => $this->request->getPost('course'),
            'image' => $safeName,
            'event_id' => $eventId,
        ];

        $attendeeModel = new AttendeeModel();
        $attendeeModel->insert($attendeeData);
        $attendeeId = (int) $attendeeModel->getInsertID();
        $this->sendConfirmationEmail($attendeeData, $event);

        return redirect()->to('/registration/success/' . $attendeeId)
            ->with('success', 'Registration complete. Please check your email for confirmation.');

    }

    public function success(int $attendeeId)
    {
        $attendee = (new AttendeeModel())
            ->select('attendees.id, attendees.fullname, attendees.email, attendees.contact, attendees.course, attendees.image, attendees.created_at, events.title AS event_title, events.date AS event_date, events.venue AS event_venue')
            ->join('events', 'events.id = attendees.event_id')
            ->find($attendeeId);

        if (! $attendee) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Registration not found.');
        }

        return view('events/success', [
            'title' => 'Registration Successful',
            'attendee' => $attendee,
        ]);
    }

    public function photo(int $attendeeId)
    {
        $attendee = (new AttendeeModel())->select('id, image')->find($attendeeId);

        if (! $attendee) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Image not found.');
        }

        $path = WRITEPATH . 'uploads/' . basename($attendee['image']);

        if (! is_file($path)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Image not found.');
        }

        return $this->response
            ->setHeader('Content-Type', mime_content_type($path))
            ->setBody(file_get_contents($path));
    }

    private function sendConfirmationEmail(array $attendee, array $event): void
    {
        $email = service('email');
        $email->setTo($attendee['email']);
        $email->setSubject('EventHub Registration Confirmation: ' . $event['title']);
        $email->setMessage(view('emails/registration_confirmation', [
            'attendee' => $attendee,
            'event' => $event,
        ]));
        $email->setAltMessage(
            "Thank you for registering for {$event['title']}.\n" .
            "Name: {$attendee['fullname']}\nCourse: {$attendee['course']}\nVenue: {$event['venue']}\nDate: {$event['date']}"
        );

        if (! $email->send(false)) {
            log_message('error', 'Registration email failed: ' . print_r($email->printDebugger(['headers']), true));
            return;
        }

        log_message('info', 'Registration email sent to ' . $attendee['email']);
    }
}
