<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDongiaMathangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dongia_mathang', function (Blueprint $table) {
            $table ->engine ='InnoDB';
            $table ->unsignedBigInteger('chth_ma')->length(11);
            $table ->unsignedBigInteger('sp_ma')->length(11);
            $table ->unsignedDecimal('dgmh_gia',13,2)->nullable();
            $table ->mediumText('dgmh_ghiChu')->nullable();
            $table ->date('dgmh_ngayCapNhat');
            $table->primary(['chth_ma','sp_ma','dgmh_ngayCapNhat']);
            $table->foreign('chth_ma')
                   ->references('chth_ma')->on('cuahangtaphoa')
                    ->onUpdate('CASCADE')
                    ->onDelete('CASCADE');
            $table->foreign('sp_ma')
                    ->references('sp_ma')->on('sanpham')
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
        Schema::dropIfExists('dongia_mathang');
    }
}
