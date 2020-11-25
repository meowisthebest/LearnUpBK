<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableTblStudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_student', function (Blueprint $table) {
            $table->bigIncrements('student_id');
            $table->string('student_username', 20);
            $table->string('student_password');
            $table->string('student_name');
            $table->string('student_email');
            $table->string('student_phone', 20)->nullable();
            $table->text('student_address')->nullable();
            $table->text('student_introduce')->nullable();
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
        Schema::dropIfExists('tbl_student');
    }
}
