<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableEpisodies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('season');
            $table->integer('number');
            $table->boolean('watched')->default(false);

            $table->integer('serie_id');
            $table->foreign('serie_id')
                ->references('id')
                ->on('series');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episodies');
    }
}
