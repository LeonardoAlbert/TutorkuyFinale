<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'asdasdasd',
                'email' => 'asdasdasd@gmail.com',
                'password' => bcrypt('asdasdasd'),
                'role' => 0,
            ],
            [
                'name' => 'user123',
                'email' => 'user@gmail.com',
                'password' => bcrypt('user123'),
                'role' => 0,
            ],
            [
                'name' => 'teacher123',
                'email' => 'teacher@gmail.com',
                'password' => bcrypt('teacher123'),
                'role' => 0,
            ],
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'role' => 2,
            ],
        ]);

    }
}
