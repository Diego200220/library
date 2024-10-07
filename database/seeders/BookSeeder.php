<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Animales fantasticos',
            'author' =>'J.K. Rowling',
            'slug' => 'Animales_fantasticos',
            'classification_id' => '1',
            'library_id' => '1'
        ]);

        Book::factory(10)
            ->create();
    }
}
