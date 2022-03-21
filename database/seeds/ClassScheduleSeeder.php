<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ClassScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Schema::create('class_schedules', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        //     $table->unsignedBigInteger('post_id');
        //     $table->datetime('start_date');
        //     $table->datetime('end_date');

        //     $table->foreign('post_id')->references('id')->on('posts')->onUpdate('cascade')->onDelete('cascade');
        // });
        DB::table('class_schedules')->insert([
            [
                'post_id' => 1,
                'start_date' => Carbon::parse('2022-02-05 15:00:00'),
                'end_date' => Carbon::parse('2022-02-05 17:00:00'),
                'status' => 'Selesai',
            ],
            [
                'post_id' => 1,
                'start_date' => Carbon::parse('2022-02-12 15:30:00'),
                'end_date' => Carbon::parse('2022-02-12 17:00:00'),
                'status' => 'Menunggu',
            ],
            [
                'post_id' => 1,
                'start_date' => Carbon::parse('2022-02-19 15:00:00'),
                'end_date' => Carbon::parse('2022-02-19 17:00:00'),
                'status' => 'Menunggu',
            ],
            [
                'post_id' => 1,
                'start_date' => Carbon::parse('2022-02-26 15:00:00'),
                'end_date' => Carbon::parse('2022-02-26 17:00:00'),
                'status' => 'Menunggu',
            ],
            [
                'post_id' => 2,
                'start_date' => Carbon::parse('2022-03-01 15:00:00'),
                'end_date' => Carbon::parse('2022-03-01 17:00:00'),
                'status' => 'Menunggu',
            ],
            [
                'post_id' => 2,
                'start_date' => Carbon::parse('2022-03-08 15:00:00'),
                'end_date' => Carbon::parse('2022-03-08 17:00:00'),
                'status' => 'Menunggu',
            ],
            [
                'post_id' => 3,
                'start_date' => Carbon::parse('2022-01-15 13:00:00'),
                'end_date' => Carbon::parse('2022-01-15 17:00:00'),
                'status' => 'Selesai',
            ],
            // [
            //     'post_id' => 4,
            //     'start_date' => Carbon::parse('2022-01-15 18:00:00'),
            //     'end_date' => Carbon::parse('2022-01-15 20:00:00'),
            //     'status' => 'Menunggu',
            // ],
            // [
            //     'post_id' => 4,
            //     'start_date' => Carbon::parse('2022-01-22 18:00:00'),
            //     'end_date' => Carbon::parse('2022-01-22 20:00:00'),
            //     'status' => 'Menunggu',
            // ],
        ]);
    }
}
