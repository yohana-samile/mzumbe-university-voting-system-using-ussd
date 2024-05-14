<?php
    namespace Database\Seeders;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use DB;


    class ProgrammeSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            DB::table('programmes')->insert([
                'name' => 'Information Technology And System',
                'programme_abbreviation' => 'ITS',
                'unit_id' => 1
            ]);
        }
    }
