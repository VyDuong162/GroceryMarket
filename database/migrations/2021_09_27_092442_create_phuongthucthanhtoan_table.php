<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhuongthucthanhtoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phuongthucthanhtoan', function (Blueprint $table) {
            $table->engine= 'InnoDB';
            $table->unsignedTinyInteger('pttt_ma')->length(10)->autoIncrement();
            $table->string('pttt_ten');
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
        Schema::dropIfExists('phuongthucthanhtoan');
    }
}
