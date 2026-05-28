<?php

use App\Models\AttendeeModel;
use App\Models\EventModel;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
final class EventHubTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    public function testHomepageReturns200(): void
    {
        $result = $this->get('/');

        $result->assertStatus(200);
        $this->assertTrue(str_contains($result->getBody(), 'EventHub'));
    }

    public function testRegistrationValidationRejectsInvalidData(): void
    {
        $validation = service('validation');
        $validation->setRules([
            'fullname' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'contact' => 'required|min_length[7]',
            'course' => 'required',
        ]);

        $isValid = $validation->run([
            'fullname' => 'A',
            'email' => 'not-an-email',
            'contact' => '123',
            'course' => '',
        ]);

        $this->assertTrue(! $isValid);
        $this->assertEquals('The email field must contain a valid email address.', $validation->getError('email'));
    }

    public function testModelConfigurationIsReady(): void
    {
        $eventModel = new EventModel();
        $attendeeModel = new AttendeeModel();

        $this->assertNotNull($eventModel->builder());
        $this->assertTrue($attendeeModel->searchable('BSIT') instanceof AttendeeModel);
    }
}
