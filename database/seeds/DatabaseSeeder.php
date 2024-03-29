<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(CategoryTypeSeeder::class);
         $this->call(CategorySeeder::class);
         $this->call(UserSeeder::class);
         $this->call(RoomSeeder::class);
         $this->call(MessageSeeder::class);
         $this->call(PostSeeder::class);
         $this->call(ClassScheduleSeeder::class);
         $this->call(OrderSeeder::class);
    }
}
