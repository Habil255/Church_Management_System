<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use App\Models\Test;
use Faker\Factory as Faker;
use illuminate\Support\Facades\DB;
class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Test::factory()
        ->times(10)
        ->create();
    }
}
