<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBattleFieldsToBattleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('battles', function (Blueprint $table) {
            $table->string('name')->nullable();
            $table->integer('pack_id');
            $table->integer('team_id');
            $table->foreign('pack_id')->references('id')->on('question_packs');
            $table->foreign('team_id')->references('id')->on('teams');
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
            $table->dropColumn('pack_id');
            $table->dropColumn('team_id');
        });
    }
}
