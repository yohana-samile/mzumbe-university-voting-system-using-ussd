<?php
    namespace Database\Seeders;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use DB;

    class UnitSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            DB::table('units')->insert([
                'name' => 'Fucalty Of Science And Technology',
                'unit_abbreviation' => 'FST',
            ]);
        }
    }
