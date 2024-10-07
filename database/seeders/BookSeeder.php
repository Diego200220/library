<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Book = new Book();

        $Book->title = 'La divina comedia';
        $Book->author = 'Dante Alihier';
        $Book->slug = 'La_divina_comedia';

        $Book->save();
        Book::factory(10)
            ->create();
    }
}
