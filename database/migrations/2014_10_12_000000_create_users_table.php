<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role'); // 0 = Student | 1 = Teacher | 2 = Admin

            $table->rememberToken();

            $table->timestamps();

            $table->integer('verif')->default(0); //0 Unverified | 1= Waiting for Verification |2 = Verified
            $table->string('fileverif')->nullable();
            
            $table->string('bank')->nullable();
            $table->string('accountnumber')->nullable();

            $table->text('headline')->nullable();
            $table->text('bio')->nullable();
            $table->string('city')->nullable();
            $table->string('image')->default("profile/userprofile.jpg");
            $table->string('country')->nullable();
            $table->double('rate')->default(0);
            $table->double('num_work')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
