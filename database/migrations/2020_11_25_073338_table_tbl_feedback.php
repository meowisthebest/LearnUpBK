<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableTblFeedback extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_feedback', function (Blueprint $table) {
            $table->bigIncrements('fee_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('err_id');
            $table->text('fee_text');
            $table->timestamps();
            $table->foreign('err_id')->references('err_id')->on('tbl_student_err');
            $table->foreign('student_id')->references('student_id')->on('tbl_student');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_feedback');
    }
}
