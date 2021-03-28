<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'admin',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'status' => 1,
        ]);
        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => $user->id,
            'user_type' => 'App\Models\User',
        ]);
    }
}
