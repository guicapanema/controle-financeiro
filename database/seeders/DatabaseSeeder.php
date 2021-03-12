<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->has(Account::factory()->count(3))
            ->create([
                'name' => 'Test User',
                'email' => 'test@user.com',
            ]);
    }
}
