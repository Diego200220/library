<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::create([
            'name' => 'Antonio Joan',
            'last_name' =>'Perez Guzman',
            'membership_card' => '112sa'
        ]);
        Client::factory(10)->create();

    }
}
