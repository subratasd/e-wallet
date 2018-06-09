<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('role_id')->default(2);
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('mobile')->default('0');
            $table->string('dob')->default('0');
            $table->string('address')->default('0');
            $table->string('money')->default('0');
            $table->string('emailV')->default('0');
            $table->string('mobileV')->default('0');
            $table->string('docV')->default('0');
            $table->string('block')->default('0');
            $table->string('code')->default('0');
            $table->string('image')->default('user.png');
            $table->rememberToken();
            $table->timestamps();
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
