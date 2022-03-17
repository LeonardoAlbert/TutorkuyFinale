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
                'count_participant' => 1,
                'status' => 'Memulai',
                'link_meeting' => "https://zoom.com",
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
                'count_participant' => 0,
                'status' => 'Menunggu Peserta',
                'link_meeting' => "",
            ],
            [
                'title' => 'Basic Data Structure',
                'description'=> 'Basic DS',
                'image' =>'profile/58MK4R1v3BZ735MvWR7yrHSCZb7MfpyIPL6MT05c.jpg',
                'user_id' => 3,
                'category_id' => 1,
                'price' => 200000,
                'class_duration' => 4,
                'occurrence' => 1,
                'participants' => 5,
                'count_participant' => 5,
                'status' => 'Selesai',
                'link_meeting' => "https://zoom.com",
            ],
            [
                'title' => 'Data Class 1',
                'description'=> 'Advance',
                'image' =>'profile/58MK4R1v3BZ735MvWR7yrHSCZb7MfpyIPL6MT05c.jpg',
                'user_id' => 3,
                'category_id' => 1,
                'price' => 500000,
                'class_duration' => 2,
                'occurrence' => 3,
                'participants' => 10,
                'count_participant' => 0,
                'status' => 'Batal',
                'link_meeting' => "",
            ],
            [
                'title' => 'Data Class 2',
                'description'=> 'Advance',
                'image' =>'profile/58MK4R1v3BZ735MvWR7yrHSCZb7MfpyIPL6MT05c.jpg',
                'user_id' => 3,
                'category_id' => 1,
                'price' => 500000,
                'class_duration' => 2,
                'occurrence' => 3,
                'participants' => 10,
                'count_participant' => 0,
                'status' => 'Batal',
                'link_meeting' => "",
            ],
            [
                'title' => 'Data 3',
                'description'=> 'Advance',
                'image' =>'profile/58MK4R1v3BZ735MvWR7yrHSCZb7MfpyIPL6MT05c.jpg',
                'user_id' => 3,
                'category_id' => 1,
                'price' => 500000,
                'class_duration' => 2,
                'occurrence' => 3,
                'participants' => 10,
                'count_participant' => 0,
                'status' => 'Batal',
                'link_meeting' => "",
            ],
        ]);
    }
}
