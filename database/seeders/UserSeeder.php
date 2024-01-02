<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'phone_number' => UserSeeder::generateRandomPhoneNumber(),
                'password' => hash::make('123'),
                'role_id' => 1,
                'image' => '1.jpg',
            ],
            [
                'name' => 'client',
                'email' => 'client@gmail.com',
                'phone_number' => UserSeeder::generateRandomPhoneNumber(),
                'password' => hash::make('456'),
                'role_id' => 2,
                'image' => '2.jpg',
            ],
            [
                'name' => 'instructor',
                'email' => 'instructor@gmail.com',
                'phone_number' => UserSeeder::generateRandomPhoneNumber(),
                'password' => hash::make('789'),
                'role_id' => 3,
                'image' => '3.jpg',
            ],
        ]);
    }

    function generateRandomPhoneNumber()
    {
        $areaCode = '+084';
        $firstPart = mt_rand(000, 999);
        $secondPart = mt_rand(00000, 99999);

        return $areaCode . $firstPart . $secondPart;
    }
}
