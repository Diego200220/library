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
        $Classification = new Classification();
        $Classification->name = 'Body horror';
        $Classification->type = '12';
        $Classification->slug = 'Body_Horror';

        $Classification-> save();
    }

}
