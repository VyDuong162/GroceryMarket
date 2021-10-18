<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\DB;
class CreateDonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhang', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->unsignedBigInteger('dh_ma')->length(11)->autoIncrement();
            $table->unsignedBigInteger('kh_ma')->length(11);
            $table->unsignedBigInteger('chth_ma')->length(11);
            $table->string('dh_diaChi',200);
            $table->decimal('dh_giaTri',13,2);
            $table->string('dh_soDienThoai',10);
            $table->string('dh_email',100);
            
            $table->string('dh_trangThai')->comment('Trạng thái đơn hàng hiện tại: 1 - chưa hoàn thành, 2-hoàn thành');
            $table->timestamp('dh_taoMoi')->useCurrent();
            $table->timestamp('dh_capNhat')->nullable();
            $table->foreign('kh_ma')->references('kh_ma')->on('khachhang')
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
        Schema::dropIfExists('donhang');
    }
}
