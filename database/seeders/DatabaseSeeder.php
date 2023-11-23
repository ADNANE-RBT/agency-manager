<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\Agency::factory()->create([
             'name' => 'admin',
             'email' => 'agency@company.com',
             'password' => Hash::make('Trololo123@'),
             'website'=> 'hi/link/1',
         ]);

        $this->call([
            AgencySeeder::class,
        ]);
    }
}
