<?php

namespace Database\Seeders;

use App\Models\RentBook;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RentBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RentBook::create([
            'ticket' => 'ticket001',
            'book_id' =>'1',
            'client_id' =>'1'
        ]);
        RentBook::factory(10)->create();

    }
}
