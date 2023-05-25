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
                'username' => 'alif',
                'email' => 'alif@gmail.com',
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

        DB::table('lomba')->insert([
            [
                'nama' => 'Menulis China',
                'tanggal_mulai' => '2023-06-01',
                'tanggal_selesai' => '2023-06-10',
                'foto' => 'foto/1684615829.jpg',
                'harga' => 100000,
                'deskripsi' => 'Kaligrafi Tionghoa atau seni lukis huruf Tionghoa adalah bentuk kaligrafi yang dipraktikan dan dihasilkan dalam kebudayaan Asia Timur, yang meliputi Korea, Taiwan, Vietnam, China, dan Jepang. Kaligrafi Cina ditandai dengan orisinalitas dan kekayaan tulisan Cina',
            ],
            [
                'nama' => 'Makan Kerupuk',
                'tanggal_mulai' => '2023-07-01',
                'tanggal_selesai' => '2023-07-10',
                'foto' => 'foto/1684615829.jpg',
                'harga' => 150000,
                'deskripsi' => 'Lomba Makan kerupuk adalah salah satu lomba yang diadakan saat perayaan Hari Kemerdekaan Indonesia. Lomba ini sangat sederhana dan bisa diikuti oleh semua orang dari segala umur atau jenis kelamin. Bahan yang dibutuhkan untuk perlombaan ini hanyalah kerupuk dan tali. ',
            ],
        ]);
    }
}