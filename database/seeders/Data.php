<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Data extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
                'status' => '1',
                'email_verified_at' => now(),
                // 'remember_token' => str_random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'Rizqi',
                'email' => 'semuamana@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'status' => '1',
                'email_verified_at' => now(),
                // 'remember_token' => str_random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data pengguna lainnya jika diperlukan
        ]);
    }
}