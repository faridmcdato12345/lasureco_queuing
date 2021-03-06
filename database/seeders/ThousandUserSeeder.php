<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class ThousandUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(5000)->create();
    }
}
