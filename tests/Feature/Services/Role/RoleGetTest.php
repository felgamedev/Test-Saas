<?php

namespace Services\Role;

use App\Models\Account;
use App\Models\Role;
use App\Models\User;
use App\Services\Role\GetRole;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoleGetTest extends TestCase
{
    use RefreshDatabase;

    public function testGetAll()
    {
        $account = Account::factory()->create();

        Role::factory()->count(5)->create(['account_id' => $account->id]);
        $allRoles = GetRole::getAll();

        $this->assertCount(5, $allRoles);
    }

    public function testGetAllWithCount()
    {
        $account = Account::factory()->create();
        $role = Role::factory()->create(['account_id' => $account->id]);
        User::factory()->count(3)->create(
            [
                'account_id' => $account->id,
                'role_id' => $role->id
            ]
        );

        $fetched_roles = GetRole::getAllWithCount()->toArray();

        $this->assertArrayHasKey('users_count', $fetched_roles[0]);
        $this->assertEquals(3, $fetched_roles[0]['users_count']);
    }

    public function testGetByCode()
    {
        $account = Account::factory()->create();
        $role = Role::factory()->create(['account_id' => $account->id]);

        $fetched_role = GetRole::getByCode($role->role_code);

        $this->assertEquals($role->id, $fetched_role->id);
    }
}
