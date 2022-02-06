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
                'category_type_id' => 3,
                'name'=> 'Data Structure',
                'image' =>'category/datastructure.png',
            ],
            [
                'category_type_id' => 3,
                'name'=> 'Object Oriented Programming',
                'image' =>'category/oop.jpg'
            ],
            [
                'category_type_id' => 3,
                'name'=> 'Basic Algorithm',
                'image' =>'category/basicalgorithm.jpg'
            ],
            [
                'category_type_id' => 3,
                'name'=> 'Advance Algorithm',
                'image' =>'category/advancealgorithm.jpg'
            ],
            [
                'category_type_id' => 2,
                'name'=> 'Beginner Fundamental Analysis ',
                'image' =>'category/fundamentalanalysis.jpg'
            ],
            [
                'category_type_id' => 2,
                'name'=> 'Advanced Technical Analysis',
                'image' =>'category/technicalanalysis2.png'
            ],
            [
                'category_type_id' => 2,
                'name'=> 'Beginner Technical Analysis',
                'image' =>'category/technicalanalysis.png'
            ],
            [
                'category_type_id' => 2,
                'name'=> 'Advanced Fundamental Analysis ',
                'image' =>'category/fundamentalanalysis2.jpg'
            ],
            [
                'category_type_id' => 1,
                'name'=> 'Materi Fisika Basic ',
                'image' =>'category/fisika1.png'
            ],
            [
                'category_type_id' => 1,
                'name'=> 'Materi Fisika Intermediate',
                'image' =>'category/fisika2.jpg'
            ],
            [
                'category_type_id' => 1,
                'name'=> 'Materi Fisika Advanced',
                'image' =>'category/fisika3.png'
            ],

            [
                'category_type_id' => 6,
                'name'=> 'Materi Kimia Basic',
                'image' =>'category/kimia1.png'
            ],
            [
                'category_type_id' => 6,
                'name'=> 'Materi Kimia Intermediate',
                'image' =>'category/kimia2.jpg'
            ],
            [
                'category_type_id' => 6,
                'name'=> 'Materi Kimia Advanced',
                'image' =>'category/kimia3.jpg'
            ],
            [
                'category_type_id' => 4,
                'name'=> 'Introduction to Accounting',
                'image' =>'category/accounting1.png'
            ],
             [
                'category_type_id' => 4,
                'name'=> 'Core Analysis Financial Statements',
                'image' =>'category/accounting2.png'
            ],
            [
                'category_type_id' => 4,
                'name'=> 'Statements of Cash Flows',
                'image' =>'category/accounting3.png'
            ],
            [
                'category_type_id' => 4,
                'name'=> 'Assets and Liabilities',
                'image' =>'category/accounting4.png'
            ],
            [
                'category_type_id' => 7,
                'name'=> 'Business Environment',
                'image' =>'category/business1.jpg'
            ],
             [
                'category_type_id' => 7,
                'name'=> 'Core Management',
                'image' =>'category/business2.png'
            ],
            [
                'category_type_id' => 7,
                'name'=> 'Business 101',
                'image' =>'category/business3.png'
            ],
            [
                'category_type_id' => 7,
                'name'=> 'Export & Import ',
                'image' =>'category/business4.jpg'
            ],
            [
                'category_type_id' => 5,
                'name'=> 'Materi Matematika Basic ',
                'image' =>'category/mat1.png'
            ],
            [
                'category_type_id' => 5,
                'name'=> 'Materi Matematika Intermediate',
                'image' =>'category/mat2.jpg'
            ],
             [
                'category_type_id' => 5,
                'name'=> 'Materi Matematika Advanced',
                'image' =>'category/mat3.png'
            ],
            [
                'category_type_id' => 5,
                'name'=> 'Materi Matematika Expert',
                'image' =>'category/mat4.png'
            ],
           
           
        ]);
    }
}
