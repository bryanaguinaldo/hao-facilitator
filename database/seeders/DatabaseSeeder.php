<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\UsersInformation;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::factory()->create([
            'name' => 'bryanaguinaldo',
            'email' => 'bryanjoseph.aguinaldo.e@bulsu.edu.ph',
            'password' => Hash::make('secret')
        ]);

        UsersInformation::factory()->create([
            'facility' => 1003,
            'name' => 'bryanaguinaldo',
            'firstname' => 'Bryan Joseph',
            'lastname' => 'Aguinaldo',
        ]);
    }
}
