<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhuongxaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phuongxa', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('px_ma')->length(5)->autoIncrement();
            $table->string('px_ten');
            $table->unsignedTinyInteger('qh_ma')->length(5);
            $table->foreign('qh_ma')->references('qh_ma')->on('quanhuyen')
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
        Schema::dropIfExists('phuongxa');
    }
}
