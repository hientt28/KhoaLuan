<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppliancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appliances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('room_id');
            $table->integer('schedule_id');
            $table->integer('category_id');
            $table->string('name');
            $table->integer('status')->nullable()->default(0);
            $table->string('electric_value');
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
        Schema::drop('appliances');
    }
}
