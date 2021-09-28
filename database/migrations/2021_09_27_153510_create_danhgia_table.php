<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanhgiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danhgia', function (Blueprint $table) {
            $table->engine ='InnoDB';
            $table->unsignedInteger('dg_ma')->length(11)->autoIncrement();
            $table->unsignedBigInteger('sp_ma')->length(11);
            $table->unsignedBigInteger('chth_ma')->length(11);
            $table->integer('dg_soDiem')->length(2);
            $table->text('dg_noiDung');
            $table->timestamp('dg_thoiGian')->useCurrent();
            $table->tinyInteger('dg_trangThai')->comment('Trạng thái: 1-chưa duyệt ,2- đã duyệt');
            $table->foreign('sp_ma')->references('sp_ma')->on('sanpham')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');
            $table->foreign('chth_ma')->references('chth_ma')->on('cuahangtaphoa')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('danhgia');
    }
}
