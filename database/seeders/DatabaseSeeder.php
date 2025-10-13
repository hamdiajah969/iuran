<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
-        //
        User::create([
            'name'=> 'Admin',
            'username'=> 'admin1',
            'password'=> bcrypt('1234'),
            'nohp'=> '0812345678910',
            'address' => 'Tasik',
            'level' => 'admin'
        ]);

        User::create([
            'name'=> 'Warga User',
            'username'=> 'warga1',
            'password'=> bcrypt('1234'),
            'nohp'=> '0812345678911',
            'address' => 'Warga Address',
            'level' => 'warga'
        ]);

    }
}
