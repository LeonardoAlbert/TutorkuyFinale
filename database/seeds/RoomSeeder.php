<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            [
                'student_id' => 2,
                'tutor_id' => 3
            ],
            [
                'student_id' => 2,
                'tutor_id' => 4
            ],
        ]);
    }
}
