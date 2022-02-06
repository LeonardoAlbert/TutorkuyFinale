<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'title' => 'Data Structure 1',
                'description'=> 'Testing DS 1',
                'image' =>'profile/58MK4R1v3BZ735MvWR7yrHSCZb7MfpyIPL6MT05c.jpg',
                'user_id' => 3,
                'category_id' => 1,
                'price' => 200000,
                'class_duration' => 2,
                'occurrence' => 4,
                'participants' => 5,
            ],
            [
                'title' => 'Data Structure 2',
                'description'=> 'Testing DS 2',
                'image' =>'profile/58MK4R1v3BZ735MvWR7yrHSCZb7MfpyIPL6MT05c.jpg',
                'user_id' => 3,
                'category_id' => 1,
                'price' => 200000,
                'class_duration' => 2,
                'occurrence' => 2,
                'participants' => 5,
            ],
        ]);
    }
}
