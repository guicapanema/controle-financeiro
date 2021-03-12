<?php

namespace Tests\Feature\Scopes;

use App\Models\Account;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserScopeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_user_can_only_see_their_accounts()
    {
        Account::factory()
            ->count(5)
            ->create();

        $user = User::factory()->create();

        $userAccounts = Account::factory()
            ->for($user)
            ->count(5)
            ->create();

        auth()->login($user);

        $this->assertEquals(5, Account::count());
    }

    /** @test */
    function a_user_can_only_see_their_categories()
    {
        Category::factory()
            ->count(5)
            ->create();

        $user = User::factory()->create();

        $userCategories = Category::factory()
            ->for($user)
            ->count(5)
            ->create();

        auth()->login($user);

        $this->assertEquals(5, Category::count());
    }
}
