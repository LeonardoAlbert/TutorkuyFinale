<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
         // $table->string('type');
            $table->string('image')->nullable();
            $table->integer('statuscategories')->default(2); // 0 -> requested || 1-> Declined || 2-> Accepted;
            $table->unsignedBigInteger('category_type_id');
            $table->timestamps();


           $table->foreign('category_type_id')->references('id')->on('category_types')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
