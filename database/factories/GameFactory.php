<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $paragraphs = [];
        foreach (range(1, rand(3, 7)) as $i) {
            $paragraphs[] = fake()->realText(750);

            if (rand(1, 5) === 1) {
                $paragraphs[] = '## Subsection';
            }
        }

        return [
            'title' => fake()->jobtitle().' Simulator',
            'description' => implode("\n\n", $paragraphs),
            'price' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
