<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuanhuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quanhuyen', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('qh_ma')->length(5)->autoIncrement();
            $table->string('qh_ten');
            $table->unsignedTinyInteger('ttp_ma')->length(5);
            $table->foreign('ttp_ma')->references('ttp_ma')->on('tinhtp')
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
        Schema::dropIfExists('quanhuyen');
    }
}
