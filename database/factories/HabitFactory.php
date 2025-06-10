<?php

declare(strict_types = 1);

namespace Database\Factories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Habit>
 */
class HabitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $habits = [
            "Wake up early",
            "Maintain a morning routine",
            "Practice gratitude",
            "Avoid procrastination",
            "Set daily goals",
            "Drink plenty of water",
            "Exercise regularly",
            "Get good sleep",
            "Eat a balanced diet",
            "Take breaks during work",
            "Read every day",
            "Learn something new",
            "Write in a journal",
            "Avoid excessive social media use",
            "Have a mentor or seek inspiring references",
            "Stay organized",
            "Be punctual",
            "Prioritize important tasks",
            "Improve communication skills",
            "Seek feedback regularly",
            "Save money consistently",
            "Avoid unnecessary debt",
            "Create a monthly budget",
            "Invest in your future",
            "Earn extra income",
            "Stay in touch with family and friends",
            "Be kind and empathetic",
            "Avoid gossip and negativity",
            "Develop emotional intelligence",
            "Help others whenever possible",
            "Practice meditation or prayer",
            "Accept and learn from mistakes",
            "Maintain a positive mindset",
            "Live in the present",
            "Be grateful for the little things",
        ];

        return [
            'user_id' => User::factory(),
            'uuid'    => fake()->uuid(),
            'title'   => fake()->randomElement($habits),
        ];
    }
}
