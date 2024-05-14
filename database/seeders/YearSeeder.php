<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('year_of_studies')->insert([
            ['name' => '1'],
            ['name' => '2'],
            ['name' => '3']
        ]);
    }
}
