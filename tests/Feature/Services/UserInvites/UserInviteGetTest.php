<?php

namespace Services\UserInvites;

use App\Models\User;
use App\Models\UserInvite;
use App\Services\UserInvite\GetUserInvite;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserInviteGetTest extends TestCase
{
    use RefreshDatabase;

    public function testGetUserInviteById()
    {
        $user = User::factory()->create();
        $userInvite = UserInvite::factory()->create([
            'user_id' => $user->id,
            'account_id' => $user->account_id
        ]);

        $retrievedUserInvite = GetUserInvite::getById($userInvite->id);

        $this->assertNotNull($retrievedUserInvite);
    }

    public function testGetUserInviteByInviteCode()
    {
        $user = User::factory()->create();
        $userInvite = UserInvite::factory()->create([
            'user_id' => $user->id,
            'account_id' => $user->account_id
        ]);

        $retrievedUserInvite = GetUserInvite::getByInviteCode($userInvite->invite_code);

        $this->assertNotNull($retrievedUserInvite);
    }

    public function testGetUserInviteByAccountId()
    {
        $user = User::factory()->create();
        UserInvite::factory()->create([
            'user_id' => $user->id,
            'account_id' => $user->account_id
        ]);

        $retrievedUserInvites = GetUserInvite::getAll();

        $this->assertNotNull($retrievedUserInvites);
        $this->assertCount(1, $retrievedUserInvites);
    }
}
