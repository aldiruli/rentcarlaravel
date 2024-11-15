<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Home;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tambahkan data dummy
        $data = [
            [
                'title' => 'Welcome to Rent Car',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            ],
            [
                'title' => 'Best Car Deals',
                'body' => 'Find the best car rental deals only here.',
            ],
            [
                'title' => 'Why Choose Us?',
                'body' => 'Affordable prices, excellent service, and a wide selection of cars.',
            ],
        ];

        // Insert data ke tabel homes
        foreach ($data as $item) {
            Home::create($item);
        }
    }
}
