<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('question_pack_id');
            $table->integer('question_level_id');
            $table->integer('question_type_id');
            $table->foreign('question_pack_id')->references('id')->on('question_packs');
            $table->foreign('question_level_id')->references('id')->on('dict_question_levels');
            $table->foreign('question_type_id')->references('id')->on('dict_question_types');
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
        Schema::dropIfExists('questions');
    }
}
