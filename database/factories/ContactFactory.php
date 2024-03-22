<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake('pt_BR')->name(),
            'email' => fake('pt_BR')->unique()->safeEmail(),
            'cpf' => fake('pt_BR')->cpf(),
            'birthDate' => fake('pt_BR')->date('Y-m-d'),
        ];
    }
}
