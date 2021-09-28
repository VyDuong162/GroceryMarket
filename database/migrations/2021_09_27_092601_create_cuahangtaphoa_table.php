<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuahangtaphoaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuahangtaphoa', function (Blueprint $table) {
           $table ->engine ='InnoDB';
           $table ->unsignedBigInteger('chth_ma')->length(11)->autoIncrement();
           $table->unsignedBigInteger('kh_ma')->length(11);
           $table ->string('chth_ten',200);
           $table ->string('chth_anhDaiDien',200);
           $table ->string('chth_soDienThoai',10);
           $table ->string('chth_email',200);
           $table ->string('chth_diaChi',200);
           $table ->string('chth_taiKhoanNganHang',200);
           $table->unsignedTinyInteger('px_ma')->length(5);
           $table ->text('chth_moTa');
           $table->foreign('kh_ma')->references('kh_ma')->on('khachhang')
           ->onUpdate('CASCADE')
           ->onDelete('CASCADE');
           $table->foreign('px_ma')->references('px_ma')->on('phuongxa')
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
        Schema::dropIfExists('cuahangtaphoa');
    }
}
