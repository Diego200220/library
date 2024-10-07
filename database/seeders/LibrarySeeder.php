<?php

namespace Database\Seeders;

use App\Models\Library;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LibrarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Library = new Library();

        $Library->name = 'Vasconsuelos 2';
        $Library->slug = 'Vasconsuelos_2';

        $Library->save();
    }
}
