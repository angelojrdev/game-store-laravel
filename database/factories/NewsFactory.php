<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titleTemplate = Arr::random([
            'Download ? For Free Today!',
            '? Coming Soon',
            '? Game Update',
            '? Release Date',
        ]);

        $paragraphs = [];
        foreach (range(1, rand(3, 7)) as $i) {
            $paragraphs[] = fake()->realText(750);

            if (rand(1, 5) === 1) {
                $paragraphs[] = "## Subsection";
            }
        }

        return [
            'title' => Str::replace('?', fake()->jobtitle() . ' Simulator', $titleTemplate),
            'content' => implode("\n\n", $paragraphs)
        ];
    }
}
