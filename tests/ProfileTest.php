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
}
