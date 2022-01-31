<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'category_type_id' => 1,
                'name'=> 'Fisika',
                'image' =>'physics.png',
            ],
            [
                'category_type_id' => 1,
                'name'=> 'Kimia',
                'image' =>'chemistry.png'
            ],
            [
                'category_type_id' => 1,
                'name'=> 'Matematika',
                'image' =>'math.png'
            ],
            [
                'category_type_id' => 2,
                'name'=> 'Finance',
                'image' =>'finance.png'
            ],
            [
                'category_type_id' => 2,
                'name'=> 'Calculus',
                'image' =>'calculus.png'
            ],
            [
                'category_type_id' => 2,
                'name'=> 'Web Programming',
                'image' =>'programming.png'
            ],
        ]);
    }
}
