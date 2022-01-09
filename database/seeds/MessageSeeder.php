<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            [
                'room_id' => 1,
                'sender_id' => 2,
                'message' => "halo",
                'is_read' => false,
                'created_at' => Carbon::parse('2022-01-08 15:00:00')
            ],
            [
                'room_id' => 1,
                'sender_id' => 2,
                'message' => "mau tanya2 dlu bisa kak?",
                'is_read' => false,
                'created_at' => Carbon::parse('2022-01-08 15:01:00')
            ],
            [
                'room_id' => 1,
                'sender_id' => 3,
                'message' => "boleh kak, ada yang bisa dibantu",
                'is_read' => false,
                'created_at' => Carbon::parse('2022-01-08 15:35:00')
            ],
        ]);
    }
}
