<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietDonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitiet_donhang', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->unsignedBigInteger('dh_ma')->length(11);
            $table->unsignedBigInteger('sp_ma')->length(11);
            $table->mediumInteger('ctdh_soLuong')->length(3);
            $table->decimal('ctdh_giaBan',13,2);
            $table->primary(['dh_ma','sp_ma']);
            $table->foreign('dh_ma')->references('dh_ma')->on('donhang')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');
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
        Schema::dropIfExists('chitiet_donhang');
    }
}
