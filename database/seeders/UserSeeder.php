<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $uuid = Str::uuid();
        $role_uuid = Str::uuid();

        $id = DB::table('users')->insertGetId([
            'uuid' => $uuid,
            'email' => 'admin@gmail.com',
            'first_name'=> 'john',
            'last_name'=> 'doe',
            'phone_number'=> '08123456789',
            'address'=> 'Jl. Jendral Sudirman No. 1',
            'province'=> 'Alberta',
            'city'=> 'Calgary',
            'postal_code'=> '12345',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('credentials')->insert([
            'user_id' => $uuid,
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $role_id = DB::table('roles')->insertGetId([
            'uuid' => $role_uuid,
            'name' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_roles')->insert([
            'user_id' => $id,
            'role_id' => $role_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
