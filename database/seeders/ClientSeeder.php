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
        $Client = new Client();

        $Client->name = 'Diego';
        $Client->last_name = 'Campos';
        $Client->membership_card = '123456789';

        $Client->save();
    }
}
