<?php

use App\Traits\LoggerTrait;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class LoggerTraitTest
 */
class LoggerTraitTest extends TestCase
{
    use DatabaseTransactions, DatabaseMigrations, LoggerTrait;

    /**
     * Test the info logging trait function.
     *
     * @group traits
     */
    public function testInfoMethod()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)->seeIsAuthenticatedAs($user);
        $this->LogInfo('Message', $user->id);

        $this->seeInDatabase('logs', [
            'Employee_id' => $user->id,
            'Customer_id' => $user->id,
            'Message'     => 'Message',
            'Level'       => self::$info,
        ]);
    }

    /**
     * Test the alert logging trait function.
     *
     * @group traits
     */
    public function testAlertMethod()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)->seeIsAuthenticatedAs($user);
        $this->LogAlert('Alert message', 2);
        $this->seeInDatabase('logs', [
            'Employee_id' => $user->id,
            'Customer_id' => 2,
            'Message'     => 'Alert message',
            'Level'       => self::$alert,
        ]);
    }

    /**
     * Test the notice logging trait function.
     *
     * @group traits
     */
    public function testNoticeMethod()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)->seeIsAuthenticatedAs($user);
        $this->LogNotice('Notice message', 3);
        $this->seeInDatabase('logs', [
            'Employee_id' => $user->id,
            'Customer_id' => 3,
            'Message'     => 'Notice message',
            'Level'       => self::$notice
        ]);
    }

    /**
     * Test the warning logging trait function.
     *
     * @group traits
     */
    public function testWarningMethod()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)->seeIsAuthenticatedAs($user);
        $this->LogWarning('Warning message', 4);
        $this->seeInDatabase('logs', [
            'Employee_id' => $user->id,
            'Customer_id' => 4,
            'Message'     => 'Warning message',
            'Level'       => self::$warning
        ]);
    }

    /**
     * Test the emergency logging trait function.
     *
     * @group trait
     */
    public function testEmergencyMethod()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)->seeIsAuthenticatedAs($user);
        $this->LogEmergency('Emergency message', 4);
        $this->seeInDatabase('logs', [
            'Employee_id' => $user->id,
            'Customer_id' => 4,
            'Message'     => 'Emergency message',
            'Level'       => self::$emergency
        ]);
    }
    
    /**
     * Test the debug log trait function.
     */
    public function testDebugMethod()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)->seeIsAuthenticatedAs($user);
        $this->LogDebug('Debug message', 5);
        $this->seeInDatabase('logs', [
            'Employee_id' => $user->id,
            'Customer_id' => 5,
            'Message'     => 'Debug message',
            'Level'       => self::$debug
        ]);
    }

    /**
     * Test the error log trait function.
     *
     * @group traits
     */
    public function testErrorMethod()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)->seeIsAuthenticatedAs($user);
        $this->LogDebug('Error message', 5);
        $this->seeInDatabase('logs', [
            'Employee_id' => $user->id,
            'Customer_id' => 5,
            'Message'     => 'Error message',
            'Level'       => self::$error
        ]);
    }

    /**
     * Test the critical log trait function.
     */
    public function testCriticalMethod()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)->seeIsAuthenticatedAs($user);
        $this->LogDebug('Critical message', 5);
        $this->seeInDatabase('logs', [
            'Employee_id' => $user->id,
            'Customer_id' => 5,
            'Message'     => 'Debug message',
            'Level'       => self::$critical
        ]);
    }
}
