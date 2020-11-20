<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableTblCourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_course', function (Blueprint $table) {
            $table->increments('course_id');
            $table->integer('category_id');
            $table->string('course_name');
            $table->string('course_img');
            $table->string('course_lever');
            $table->text('course_overview');
            $table->text('course_learned');
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
        Schema::dropIfExists('tbl_course');
    }
}
