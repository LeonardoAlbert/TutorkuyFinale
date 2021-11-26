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
                'image' =>'category/3mkk1mQRUveldwXE1SJYF06K5CPK5t41hU1UNgnr.jpg',
            ],
            [
                'category_type_id' => 1,
                'name'=> 'Kimia',
                'image' =>'category/3mkk1mQRUveldwXE1SJYF06K5CPK5t41hU1UNgnr.jpg'
            ],
            [
                'category_type_id' => 1,
                'name'=> 'Matematika',
                'image' =>'category/3mkk1mQRUveldwXE1SJYF06K5CPK5t41hU1UNgnr.jpg'
            ],
            [
                'category_type_id' => 2,
                'name'=> 'Finance',
                'image' =>'category/3mkk1mQRUveldwXE1SJYF06K5CPK5t41hU1UNgnr.jpg'
            ],
            [
                'category_type_id' => 2,
                'name'=> 'Calculus',
                'image' =>'category/3mkk1mQRUveldwXE1SJYF06K5CPK5t41hU1UNgnr.jpg'
            ],
            [
                'category_type_id' => 2,
                'name'=> 'Web Programming',
                'image' =>'category/3mkk1mQRUveldwXE1SJYF06K5CPK5t41hU1UNgnr.jpg'
            ],
        ]);
    }
}
