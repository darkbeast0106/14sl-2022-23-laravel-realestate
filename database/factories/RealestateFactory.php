<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Realestate>
 */
class RealestateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user_ids = User::all()->pluck("id");
        $area = fake()->numberBetween(10, 1000);
        $max_room_count = min(15, ceil($area / 60));
        $random = rand(0,2);
        $rent = fake()->numberBetween(30000, 500000);
        $cost = fake()->numberBetween($area * 50000, $area * 1_000_000);
        if ($random == 0) {
            $rent = null;
        } elseif ($random == 1) {
            $cost = null;
        }
        return [
            "user_id" => fake()->randomElement($user_ids),
            "address" => fake()->address(),
            "area" => $area,
            "room_count" => fake()->numberBetween(1, $max_room_count),
            "rent" => $rent,
            "cost" => $cost,
        ];
    }
}
