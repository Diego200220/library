<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Classification;
use App\Models\Client;
use App\Models\Library;
use App\Models\RentBook;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Book::factory(10)->create();
        Classification::factory(10)->create();
        Client::factory(10)->create();
        Library::factory(10)->create();
        RentBook::factory(10)->create();

        $this->call(BookSeeder::class);
    }
}
