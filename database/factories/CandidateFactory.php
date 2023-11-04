<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidate>
 */
class CandidateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $salaraies = [
            '1000000',
            '2000000',
            '3000000',
            '4000000',
            '5000000',
        ];
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'phone_number' => $this->faker->unique()->e164PhoneNumber(),
            'full_name' => $this->faker->name(),
            'dob' => $this->faker->date(),
            'pob'=> $this->faker->country(),
            'gender' => $this->faker->randomElement(['M', 'F']),
            'year_exp' => $this->faker->numberBetween(0, 50),
            'last_salary' => $this->faker->randomElement($salaraies),
        ];
    }
}
