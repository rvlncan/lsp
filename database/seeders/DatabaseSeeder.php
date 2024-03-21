<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'level' => 'admin',
            'aktif' => 1
        ]);
        DB::table('Karyawan')->insert([
            'nama_karyawan' => 'admin',
            'alamat' => 'Surabaya nomer 123',
            'no_hp' => '0987654321',
            'jabatan' => 'administrasi',
            'id_user' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'oprator',
            'email' => 'oprator@gmail.com',
            'password' => Hash::make('password'),
            'level' => 'oprator',
            'aktif' => 1
        ]);
        DB::table('Karyawan')->insert([
            'nama_karyawan' => 'oprator ganteng',
            'alamat' => 'Surabaya nomer 123',
            'no_hp' => '0987654321',
            'jabatan' => 'oprator',
            'id_user' => 2
        ]);
        DB::table('users')->insert([
            'name' => 'pemilik',
            'email' => 'pemilik@gmail.com',
            'password' => Hash::make('password'),
            'level' => 'pemilik',
            'aktif' => 1
        ]);
        DB::table('Karyawan')->insert([
            'nama_karyawan' => 'pemilik ganas',
            'alamat' => 'Surabaya nomer 123',
            'no_hp' => '0987654321',
            'jabatan' => 'pemilik',
            'id_user' => 3
        ]);
        DB::table('users')->insert([
            'name' => 'pelanggan',
            'email' => 'pelanggan@gmail.com',
            'password' => Hash::make('password'),
            'level' => 'pelanggan',
            'aktif' => 1
        ]);
        DB::table('Pelanggan')->insert([
            'nama_lengkap' => 'Melodi',
            'alamat' => 'Jakarta nomer 12312',
            'no_hp' => '09123999994',
            'foto' => 'f.png',
            'id_user' => 4
        ]);
    }
}
