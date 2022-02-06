<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategoryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_types')->insert([
            [
                'name' => 'Fisika',
            ],
            [
                'name' => 'Finance',
            ],
            [
                'name' => 'Computer Science',
            ],
            [
                'name' => 'Accounting',
            ],
            [
                'name' => 'Matematika',
            ],
            [
                'name' => 'Kimia',
            ],
            [
                'name' => 'Business',
            ],
         

            
        ]);
    }
}
