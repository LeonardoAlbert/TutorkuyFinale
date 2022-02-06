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
                'start_date' => Carbon::parse('2022-02-28 15:00:00'),
                'end_date' => Carbon::parse('2022-02-28 17:00:00'),
            ],
            [
                'post_id' => 1,
                'start_date' => Carbon::parse('2022-03-05 15:00:00'),
                'end_date' => Carbon::parse('2022-03-05 17:00:00'),
            ],
            [
                'post_id' => 1,
                'start_date' => Carbon::parse('2022-03-12 15:00:00'),
                'end_date' => Carbon::parse('2022-03-12 17:00:00'),
            ],
            [
                'post_id' => 1,
                'start_date' => Carbon::parse('2022-03-19 15:00:00'),
                'end_date' => Carbon::parse('2022-03-19 17:00:00'),
            ],
            [
                'post_id' => 2,
                'start_date' => Carbon::parse('2022-03-01 15:00:00'),
                'end_date' => Carbon::parse('2022-03-01 17:00:00'),
            ],
            [
                'post_id' => 2,
                'start_date' => Carbon::parse('2022-03-08 15:00:00'),
                'end_date' => Carbon::parse('2022-03-08 17:00:00'),
            ],
        ]);
    }
}
