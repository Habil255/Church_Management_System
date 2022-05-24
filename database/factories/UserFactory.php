<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Spatie\LaravelIgnition\Support\Composer\FakeComposer;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
       
        $user= [
            
            'first_name' => $this->faker->firstname,
            'middle_name' => $this->faker->lastname,
            'last_name' => $this->faker->lastname,
            'username' => $this->faker->username,
            'gender' => $this->faker->randomElement(['M','F']),
            'date_of_birth' => $this->faker->date(),
            'place_of_birth' => $this->faker->streetName(),
            'marital_status' => $this->faker->randomElement(['Married','Not Married']),
            'spouse_name' => $this->faker->name,
            'email' => $this->faker->safeEmail(),
            'password' => bcrypt('secret')
            // 'created_at' => $this->faker->date(),
        ];
        
        
        return $user;
       
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
