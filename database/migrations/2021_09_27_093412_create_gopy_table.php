<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGopyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gopy', function (Blueprint $table) {
            $table->engine ='InnoDB';
            $table->unsignedInteger('gy_ma')->length(11)->autoIncrement();
            $table->unsignedBigInteger('kh_ma')->length(11);
            $table->unsignedBigInteger('chth_ma')->length(11);
            $table->dateTime('gy_thoiGian')->format('d-m-Y H:i:s');
            $table->text('gy_noiDung');
            $table->tinyInteger('gy_trangThai')->length(3)->conmment('Trạng thái: 1-chưa duyệt, 2 đã duyệt');
            $table->foreign('kh_ma')->references('kh_ma')->on('khachhang')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');
            $table->foreign('chth_ma')->references('chth_ma')->on('cuahangtaphoa')
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
        Schema::dropIfExists('gopy');
    }
}
