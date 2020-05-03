<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flags', function (Blueprint $table) {
            $table->id();
            $table->text('challenge_name');
            $table->longText('flag');
            $table->text('course');
            $table->timestamps();
        });

//        Schema::create('flag_user', function (Blueprint $table) {
//            $table->id();
//            $table->bigInteger('user_id')->unsigned();
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
//            $table->bigInteger('flag_id')->unsigned();
//            $table->foreign('flag_id')->references('id')->on('flags')->onDelete('cascade');;
//            $table->boolean('flag_submitted');
//            $table->timestamps();
//        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flags');
    }
}
