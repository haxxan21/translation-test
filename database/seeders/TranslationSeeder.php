<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Translation;
use Faker\Factory as Faker;

class TranslationSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();


        $translations = [];

        foreach (range(1, 100000) as $index) {
            $tags = ['web', 'mobile', 'desktop'];

            $randomTags = $faker->randomElements($tags, $faker->numberBetween(1, 3));

            $translations[] = [
                'key' => Str::random(20), // Unique key with more variety
                'locale' => $faker->randomElement(['en', 'fr', 'es', 'de']),
                'content' => $faker->sentence,
                'tags' => json_encode($randomTags),
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Insert in chunks of 1000 records to improve performance
            if (count($translations) >= 1000) {
                Translation::insert($translations);
                $translations = [];
            }
        }

        // Insert any remaining records
        if (count($translations) > 0) {
            Translation::insert($translations);
        }

        $this->command->info('100,000 translations have been seeded.');
    }
}
