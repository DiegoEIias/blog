<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRankPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rank_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('id_permission');
            $table->foreign('id_permission', 'fk_rankpermission_permission')->references('id')->on('permissions')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedBigInteger('id_rank');
            $table->foreign('id_rank', 'fk_rankpermission_rank')->references('id')->on('ranks')->onDelete('cascade')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rank_permissions');
    }
}
