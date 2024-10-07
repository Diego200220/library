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
        $RentBook = new RentBook();

        $RentBook->ticket = '123456789';
    }
}
