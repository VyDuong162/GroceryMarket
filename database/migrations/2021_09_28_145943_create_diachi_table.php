<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiachiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diachi', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('dc_ma')->length(11)->autoIncrement();
            $table->string('dc_ten');
            $table->unsignedBigInteger('kh_ma')->length(11);
            $table->foreign('kh_ma')->references('kh_ma')->on('khachhang')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');
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
        Schema::dropIfExists('diachi');
    }
}
