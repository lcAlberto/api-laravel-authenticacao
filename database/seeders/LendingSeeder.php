<?php

namespace Database\Seeders;

use App\Models\Lending;
use Illuminate\Database\Seeder;

class LendingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lending::factory(5)->create();
    }
}
