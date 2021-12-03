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
                'image' =>'assets/img/logo/Math University.png',
            ],
            [
                'category_type_id' => 1,
                'name'=> 'Kimia',
                'image' =>'assets/img/logo/Chemistry.png'
            ],
            [
                'category_type_id' => 1,
                'name'=> 'Matematika',
                'image' =>'assets/img/logo/Math University.png'
            ],
            [
                'category_type_id' => 2,
                'name'=> 'Finance',
                'image' =>'assets/img/logo/Math University.png'
            ],
            [
                'category_type_id' => 2,
                'name'=> 'Calculus',
                'image' =>'assets/img/logo/Math University.png'
            ],
            [
                'category_type_id' => 2,
                'name'=> 'Web Programming',
                'image' =>'assets/img/logo/Math University.png'
            ],
        ]);
    }
}
