<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVanchuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vanchuyen', function (Blueprint $table) {
            $table->engine= 'InnoDB';
            $table->unsignedBigInteger('dh_ma')->length(11);
            $table->unsignedTinyInteger('tt_ma')->length(3);
            $table->datetime('vc_ngay')->format('d-m-Y H:i:s');
            $table->foreign('dh_ma')->references('dh_ma')->on('donhang')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');
            $table->foreign('tt_ma')->references('tt_ma')->on('trangthai')
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
        Schema::dropIfExists('vanchuyen');
    }
}
