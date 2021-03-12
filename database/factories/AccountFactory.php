<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Account::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'name' => $faker->words(2, true),
            'type' => $faker->randomElement([
                'CHECKING',
                'SAVINGS',
                'CREDITCARD',
            ]),
            'color' => $faker->hexColor(),
        ];
    }

    /**
     * Indicate that the account is a checking account
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function checking()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'CHECKING',
            ];
        });
    }

    /**
     * Indicate that the account is a savings account
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function savings()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'SAVINGS',
            ];
        });
    }

    /**
     * Indicate that the account is a credit card
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function creditCard()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'CREDITCARD',
            ];
        });
    }
}
