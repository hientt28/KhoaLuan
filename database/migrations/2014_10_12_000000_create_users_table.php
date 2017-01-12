<?php

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
            $table->string('name', 100)->nullable()->default(null);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('avatar', 200)->nullable()->default(config('common.avatar_default'));
            $table->string('address');
            $table->integer('phone');
            $table->integer('role');
            $table->boolean('confirmed');
            $table->string('confirmation_code');
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
        Schema::drop('users');
    }
}
