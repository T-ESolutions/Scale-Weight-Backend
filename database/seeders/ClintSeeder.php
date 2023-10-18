<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Client::find(1)) {
            Client::updateOrCreate([
                'id' => 1,
                'name' => 'client test',
                'phone' => '01111651415',
                'email' => 'client@gmail.com',
                'email_verified_at' => \Carbon\Carbon::now(),
                'password' => '123456',
                'address' => 'address',
                'branch_id' => 1,
                'state_id' => 1,
            ]);
        }
    }
}
