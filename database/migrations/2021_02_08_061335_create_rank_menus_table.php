<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRankMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rank_menus', function (Blueprint $table) {
            $table->unsignedBigInteger('id_menu');
            $table->foreign('id_menu', 'fk_menurank_menu')->references('id')->on('menus')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedBigInteger('id_rank');
            $table->foreign('id_rank', 'fk_menurank_rank')->references('id')->on('ranks')->onDelete('cascade')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rank_menus');
    }
}
