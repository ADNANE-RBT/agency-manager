<?php

namespace Database\Seeders;

use App\Models\Agency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Agency::factory()
            ->hasStaff(13)
            ->create();
        Agency::factory()
            ->count(7)
            ->create();
        Agency::factory()
            ->count(19)
            ->hasStaff(6)
            ->create();

    }
}
