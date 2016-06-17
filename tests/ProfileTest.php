<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class ProfileTest
 */
class ProfileTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * GET: /profile
     *
     * @group all
     * @group acl
     */
    public function testSettingsView()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->visit('/profile')
            ->seeStatusCode(200);
    }

    /**
     * POST: /profile/update/info
     *
     * @group all 
     * @group acl
     */
    public function testInformationUpdateSuccess()
    {
        $user = factory(App\User::class)->create();

        // Simulated inputs
        $input['name']  = 'Jhon Doe';
        $input['email'] = 'Jhondoe@example.be';

        // Old database values 
        $oldDb['name']  = $user->name; 
        $oldDb['email'] = $user->email;

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->seeInDatabase('users', $oldDb)
            ->post('/profile/update/info', $input)
            ->dontSeeInDatabase('users', $oldDb)
            ->seeInDatabase('users', $input)
            ->seeStatusCode(302);
    }

    /**
     * POST: /profile/update/info
     *
     * @group all 
     * @group acl
     */
    public function testInformationUpdateError()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->post('/profile/update/info', [])
            ->seeStatusCode(302)
            ->assertHasOldInput();
    }

    /**
     * POST: /profile/update/password
     *
     * @group all 
     * @group acl
     */
    public function testCredentialsUpdateSuccess()
    {
        $user = factory(App\User::class)->create();

        // Old database values 
        $oldDb['password']  = $user->password; 

        // Input values 
        $input['password'] = 'newPassword';
        $input['password_confirmation'] = 'newPassword'; 

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->seeInDatabase('users', $oldDb)
            ->post('/profile/update/password', $input)
            ->seeStatusCode(302);
    }

    /**
     * POST: /profile/update/password
     * 
     * @group all 
     * @group acl
     */
    public function testCredentialsUpdateErrors()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->post('/profile/update/password', [])
            ->seeStatusCode(302)
            ->assertHasOldInput();
    }
}
