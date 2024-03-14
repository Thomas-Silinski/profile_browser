<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\VarDumper\VarDumper;
use Tests\TestCase;

class StarTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/stars');

        $response->assertStatus(200);
    }

    /**
     * A basic functional test example.
     */
    public function test_interacting_with_headers(): void
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/stars', [
            'firstname' => 'John',
            'lastname' => 'Doe',
            'description' => 'In English, John Doe is an expression used to designate an unidentified person or a man in the street, or in French: "Monsieur X", "Monsieur Untel", "Monsieur Durand", "Monsieur Dupont", "Monsieur Tout-le-monde", "un citoyen Lambda".',
            'image_url' => 'https://via.placeholder.com/640x480.png/0022cc?text=doe',
            'created_at' => now()->addMinute()
        ]);

        $response->assertStatus(302);
    }

    /**
     * A basic functional test example.
     */
    public function test_interacting_put(): void
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->put('/stars/2', [
            'firstname' => 'Robert',
            'lastname' => 'Pattinson',
            'description' => 'In English, John Doe is an expression used to designate an unidentified person or a man in the street, or in French: "Monsieur X", "Monsieur Untel", "Monsieur Durand", "Monsieur Dupont", "Monsieur Tout-le-monde", "un citoyen Lambda".',
            'image_url' => 'https://via.placeholder.com/640x480.png/0022cc?text=doe',
            'created_at' => now()->addMinute()
        ]);

        $response->assertStatus(302);
    }

    /**
     * A basic feature test example.
     */
    public function get_stars(): void
    {
        $response = $this->get('/stars');

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     */
    public function test_star_by_id_not_found(): void
    {
        $response = $this->get('/stars/0/edit');

        $response->assertStatus(404);
    }

    /**
     * A basic feature test example.
     */
    public function test_star_by_id(): void
    {
        $response = $this->get('/stars/2/edit');

        $response->assertStatus(200);
    }
}
