<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHinhanhsanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hinhanhsanpham', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('hasp_ma')->length(11)->autoIncrement();
            $table->string('hasp_hinhAnh',200);
            $table->unsignedBigInteger('sp_ma')->length(11);
            $table->foreign('sp_ma')->references('sp_ma')->on('sanpham')
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
        Schema::dropIfExists('hinhanhsanpham');
    }
}
