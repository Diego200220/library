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
        $this->call(ClassificationSeeder::class);
        $this->call(LibrarySeeder::class);
        $this->call(BookSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(RentBookSeeder::class);
    }
}
