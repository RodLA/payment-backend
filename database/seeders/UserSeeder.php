<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'first_name' => 'User',
            'last_name' => 'IA',
            'dob' => '2001-02-24',
            'phone' => '9999999',
            'email' => 'user@gmail.com',
            'address' => 'Av. Arequipa'
        ]);
    }
}
