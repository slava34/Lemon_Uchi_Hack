<?php

use App\Models\Dictionaries\DictQuestionTypes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FillDictQuestionTypesTable extends Migration
{
    const Types = [
        [
            'types' => 'attack',
        ],
        [
            'types' => 'def',
        ],
        [
            'types' => 'none',
        ],

    ];
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dict_question_types', function (Blueprint $table) {
        foreach (static::Types as $type) {
            DictQuestionTypes::query()->create([
                'dv' => $type['types']
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
