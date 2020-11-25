<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblChappterContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_chappter_content', function (Blueprint $table) {
            $table->bigIncrements('chappter_content_id');
            $table->unsignedBigInteger('chappter_id');
            $table->string('chappter_content_name');
            $table->string('chappter_content_link');
            $table->integer('is_mandatory');
            $table->timestamps();
            $table->foreign('chappter_id')->references('chappter_id')->on('tbl_chappter');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_chappter_content');
    }
}
