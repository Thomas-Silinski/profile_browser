<?php

namespace Database\Seeders;

use App\Models\Star;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Star::factory()->count(50)->create();

        Star::query()->create([
            'firstname'        => 'Thomas',
            'lastname'     => 'Silinski',
            'image_url'   => 'https://avatars.githubusercontent.com/u/50198676?v=4',
            'description' => 'Young, ambitious, self-taught, loves learning new things, technophile here are some words that describe me rather well.
            I have been developing in PHP for more than 5 years. I\'m a graduate of EPITECH with a passion for the web and a great curiosity.
            I have 3 years experience in a variety of fields and specialise in full-stack development.',
            'created_at' => now()->addMinute(),
        ]);
    }
}
