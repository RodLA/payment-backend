<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payments')->insert([
            'id' => 1,
            'user_id' => 1,
            'transaction_id' => 'T001',
            'amount' => '1200',
            'date' => '2022-02-12',
        ]);
        DB::table('payments')->insert([
            'id' => 2,
            'user_id' => 1,
            'transaction_id' => 'T002',
            'amount' => '3000',
            'date' => '2022-04-19',
        ]);
        DB::table('payments')->insert([
            'id' => 3,
            'user_id' => 1,
            'transaction_id' => 'T003',
            'amount' => '1800',
            'date' => '2022-07-02',
        ]);
    }
}
