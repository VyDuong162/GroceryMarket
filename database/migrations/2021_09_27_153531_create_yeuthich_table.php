<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYeuthichTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yeuthich', function (Blueprint $table) {
            $table-> engine ='InnoDB';
           $table->unsignedInteger('ty_ma')->length(11)->autoIncrement();
           $table->unsignedBigInteger('sp_ma')->length(11);
           $table->unsignedBigInteger('chth_ma')->length(11);
           $table->unsignedBigInteger('kh_ma')->length(11);
           $table->foreign('sp_ma')->references('sp_ma')->on('sanpham')
           ->onUpdate('CASCADE')
           ->onDelete('CASCADE');
           $table->foreign('chth_ma')->references('chth_ma')->on('cuahangtaphoa')
           ->onUpdate('CASCADE')
           ->onDelete('CASCADE');
           $table->foreign('kh_ma')->references('kh_ma')->on('khachhang')
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
        Schema::dropIfExists('yeuthich');
    }
}
