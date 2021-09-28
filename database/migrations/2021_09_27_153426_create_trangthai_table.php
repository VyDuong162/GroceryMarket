<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrangthaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trangthai', function (Blueprint $table) {
            $table->engine= 'InnoDB';
            $table->unsignedTinyInteger('tt_ma')->length(10)->autoIncrement();
            $table->string('tt_ten');
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
        Schema::dropIfExists('trangthai');
    }
}
