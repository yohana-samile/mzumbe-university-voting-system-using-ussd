<?php
    namespace Database\Seeders;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use DB;
    use Illuminate\Support\Facades\Hash;

    class UserSeeder extends Seeder {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            DB::table('users')->insert([
                'name' => 'Developer Samile',
                'gender' => 'male',
                'phone_number' => '620350083',
                'email' => 'yohanasamile@gmail.com',
                'role_id' => 1,
                'regstration_number' => '14322085/T.21',
                'year_of_studie_id' => 3,
                'programme_id' => 1,
                'password' => Hash::make('12345678'),
            ]);
        }
    }
