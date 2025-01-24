<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Translation>
 */
class TranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $locales = ['en', 'fr', 'es'];
        $tags = ['web', 'mobile', 'desktop'];

        return [
            'key' => $this->faker->word,
            'locale' => $this->faker->randomElement($locales),
            'content' => $this->faker->sentence,
            'tags' => [$this->faker->randomElement($tags)],
        ];
    }
}
