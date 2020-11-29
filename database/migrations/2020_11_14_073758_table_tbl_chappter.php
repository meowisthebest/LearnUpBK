<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableTblChappter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_chappter', function (Blueprint $table) {
            $table->bigIncrements('chappter_id');
            $table->unsignedBigInteger('course_id');
            $table->string('chappter_name');
            $table->timestamps();
            $table->foreign('course_id')->references('course_id')->on('tbl_course');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_chappter');
    }
}
