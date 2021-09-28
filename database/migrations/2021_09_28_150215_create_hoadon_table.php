<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoadonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadon', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('hd_ma')->length(50)->primary();
            $table->decimal('hd_giaTri');
            $table->dateTime('hd_ngayLap')->format('d-m-Y H:i:s');
            $table->unsignedBigInteger('dh_ma')->length(11);
            $table->foreign('dh_ma')->references('dh_ma')->on('donhang')
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
        Schema::dropIfExists('hoadon');
    }
}
