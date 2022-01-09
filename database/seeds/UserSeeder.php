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
                'image' => 'profile/userprofile.jpg',
                'verif' => 0,
            ],
            [
                'name' => 'User 1',
                'email' => 'user@gmail.com',
                'password' => bcrypt('user123'),
                'role' => 0,
                'image' => 'profile/avatar3.png',
                'verif' => 0,
            ],
            [
                'name' => 'teacher-1',
                'email' => 'teacher@gmail.com',
                'password' => bcrypt('teacher123'),
                'role' => 1,
                'image' => 'profile/avatar1.png',
                'verif' => 0,
            ],
            [
                'name' => 'teacher-2',
                'email' => 'teacher2@gmail.com',
                'password' => bcrypt('teacher123'),
                'role' => 1,
                'image' => 'profile/avatar2.png',
                'verif' => 1,
            ],
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'role' => 2,
                'image' => 'profile/userprofile.jpg',
                'verif' => 0,
            ],
        ]);

    }
}
