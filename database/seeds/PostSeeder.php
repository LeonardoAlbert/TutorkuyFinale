<?php

use Illuminate\Database\Seeder;

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
                'title' => 'UN SD Fisika',
                'description'=> 'Persiapan untuk UN SD Fisika',
                'image' =>'UN_Fisika.png',
                'user_id' => 3,
                'category_id' => 1,
                'price' => 200000
            ],
            [
                'title' => 'Fisika Dasar',
                'description'=> 'Pengantar fisika untuk kelas SD',
                'image' =>'SD_Fisika.png',
                'user_id' => 3,
                'category_id' => 1,
                'price' => 100000
            ]
        ]);
    }
}
