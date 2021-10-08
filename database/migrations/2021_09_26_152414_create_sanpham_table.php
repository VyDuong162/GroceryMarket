<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->engine ='InnoDB';
            $table->unsignedBigInteger('sp_ma')->length(11)->autoIncrement();
            $table->string('sp_ten',200);
            $table->unsignedTinyInteger('lsp_ma')->length(10);
            $table->unsignedTinyInteger('nsx_ma')->length(10);
            $table->string('sp_anhDaiDien',100)->nullable();
            $table->text('sp_thanhPhan')->nullable();
            $table->mediumText('sp_cachDung')->nullable();
            $table->string('sp_khoiLuong',100)->nullable();
            $table->string('sp_baoQuan',200)->nullable();
            $table->string('sp_doiTuongDung',200)->nullable();
            $table->string('sp_ghiChu',200)->nullable();
            $table->text('sp_moTaNgan',200)->nullable();
            $table->mediumText('sp_hanDung')->nullable();
            $table->tinyInteger('sp_trangThai')->length(3)->default('1')->comment('Trạng thái # sản phẩm: 1- còn hàng, 2- hết hàng');
            $table->foreign('lsp_ma')->references('lsp_ma')->on('loaisanpham')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');
            $table->foreign('nsx_ma')->references('nsx_ma')->on('nhasanxuat')
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
        Schema::dropIfExists('sanpham');
    }
}
