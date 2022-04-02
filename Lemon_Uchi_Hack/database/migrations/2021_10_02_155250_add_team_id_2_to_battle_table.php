<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTeamId2ToBattleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('battles', function (Blueprint $table) {
            $table->integer('second_team_id')->nullable();
            $table->foreign('second_team_id')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('battles', function (Blueprint $table) {
            $table->dropColumn('second_team_id');
        });
    }
}
