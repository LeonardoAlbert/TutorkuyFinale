<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            [
                'status' => 'Sudah Dibayar',
                'image' =>'proofofpayment/XaXHLeh3tfDpH7tirrrmzNeYiNq7P6KebH0YeHae.png',
                'banknumber' => '12345678',
                'bankcode' => 'BCA',
                'ordername' => 'Order for learning Data Structure 1',
                'total' => 800000,
                'post_id' => 1,
                'orderuser_id' => 2,
                // 'classschedule_id' => 1,
                'created_at' => Carbon::parse('2022-01-08 15:00:00')
            ],
        ]);
    }
}
