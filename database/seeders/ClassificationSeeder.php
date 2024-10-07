<?php

namespace Database\Seeders;

use App\Models\Classification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classification::create([
            'name' => 'horror Body',
            'type'=> '12',
            'slug'=> 'horror_Body'
        ]);

        Classification::factory(10)
            ->create();
    }

}
