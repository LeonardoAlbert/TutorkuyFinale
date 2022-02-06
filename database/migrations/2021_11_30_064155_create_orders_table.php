<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id()->increment();
            $table->string('status');
            $table->string('image');
            $table->string('linkmeeting')->nullable();
            $table->string('material')->nullable();
            $table->string('banknumber')->nullable();
            $table->string('bankcode')->nullable();
            $table->string('ordername')->nullable();
            $table->integer('total');

            $table->timestamps();

            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('orderuser_id');
            // $table->unsignedBigInteger('classschedule_id');

            // $table->foreign('classschedule_id')->references('id')->on('class_schedules')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('orderuser_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
