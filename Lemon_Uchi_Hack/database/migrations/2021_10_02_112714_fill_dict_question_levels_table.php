<?php

use App\Models\Dictionaries\DictQuestionLevels;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FillDictQuestionLevelsTable extends Migration
{
    const Levels = [
        [
            'level' => 'Легкий',
        ],
        [
            'level' => 'Средний',
        ],
        [
            'level' => 'Сложный',
        ],

    ];
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dict_question_levels', function (Blueprint $table) {
            foreach (static::Levels as $type) {
                DictQuestionLevels::query()->create([
                    'dv' => $type['level']
                ]);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
