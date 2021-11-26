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
                'name' => 'Materi Kelas SD',
            ],
            [
                'name' => 'Materi Kelas SMP',
            ],
            [
                'name' => 'Materi Kelas SMA',
            ],
            [
                'name' => 'Materi Kuliah',
            ],
        ]);
    }
}
