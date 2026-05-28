<?php

use App\Models\AttendeeModel;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
final class EventHubWeek14Test extends CIUnitTestCase
{
    use FeatureTestTrait;

    public function testHomePage(): void
    {
        $result = $this->get('/');

        $result->assertStatus(200);
        $this->assertTrue(str_contains($result->getBody(), 'EventHub'));
    }

    public function testAttendeeModelPerPageLimit(): void
    {
        $model = new AttendeeModel();

        $this->assertNotNull($model);
        $this->assertEquals(5, $model->perPageLimit());
    }

    public function testRegistrationValidationRulePassesAndFails(): void
    {
        $validation = service('validation');
        $validation->setRules([
            'fullname' => 'required|min_length[3]|max_length[120]',
            'email' => 'required|valid_email|max_length[150]',
            'contact' => 'required|min_length[7]|max_length[30]',
            'course' => 'required|max_length[120]',
        ]);

        $valid = $validation->run([
            'fullname' => 'Gerald Nazareno',
            'email' => 'gerald@example.com',
            'contact' => '09171234567',
            'course' => 'BSIT',
        ]);

        $this->assertTrue($valid);

        $invalid = $validation->run([
            'fullname' => 'G',
            'email' => 'wrong-email',
            'contact' => '12',
            'course' => '',
        ]);

        $this->assertTrue(! $invalid);
        $this->assertEquals('The email field must contain a valid email address.', $validation->getError('email'));
    }
}
