<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDictClassIdFieldToQuestionPacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('question_packs', function (Blueprint $table) {
            $table->integer('dict_class_id')->nullable();
            $table->foreign('dict_class_id')->references('id')->on('dict_class');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('question_packs', function (Blueprint $table) {
            $table->dropColumn('question_packs');
        });
    }
}
