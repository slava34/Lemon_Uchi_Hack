<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBallsToBattlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('battles', function (Blueprint $table) {
            $table->integer('first_team_balls')->default(0);
            $table->integer('second_team_balls')->default(0);
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
            $table->dropColumn('first_team_balls');
            $table->dropColumn('second_team_balls');
        });
    }
}
