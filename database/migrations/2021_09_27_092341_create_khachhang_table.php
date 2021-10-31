<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhachhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khachhang', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->unsignedBigInteger('kh_ma')->length(11)->autoIncrement();
            $table->string('kh_hoTen',100);
            $table->tinyInteger('kh_gioiTinh')->length(2)->comment('Giới tính: 1-nam, 2-nữ')->nullable();
            $table->date('kh_ngaySinh')->format('d/m/Y')->nullable();
            $table->string('kh_soDienThoai',10);
            $table->string('kh_email',200)->nullable();
            $table->string('kh_taiKhoan',100)->unique()->nullable();
            $table->string('kh_matKhau',100)->nullable();
            $table->unsignedTinyInteger('vt_ma')->length(3);
            $table->unsignedTinyInteger('px_ma')->length(5);
            $table->tinyInteger('kh_trangThai')->length(2)->comment('trạng thái: 1- hoạt động , 2- không hoạt động');
            $table->foreign('px_ma')->references('px_ma')->on('phuongxa')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');
            $table->foreign('vt_ma')->references('vt_ma')->on('vaitro')
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
        Schema::dropIfExists('khachhang');
    }
}
