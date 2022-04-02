<?php

use App\Models\Dictionaries\DictClass;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FillDictClassesTable extends Migration
{
    const Classes = [
        [
            'class' => '1 класс',
        ],
        [
            'class' => '2 класс',
        ],
        [
            'class' => '3 класс',
        ],
        [
            'class' => '4 класс',
        ],
        [
            'class' => '5 класс',
        ],
        [
            'class' => '6 класс',
        ],
        [
            'class' => '7 класс',
        ],
        [
            'class' => '8 класс',
        ],
        [
            'class' => '9 класс',
        ],
        [
            'class' => '10 класс',
        ],
        [
            'class' => '11 класс',
        ],
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dict_classes', function (Blueprint $table) {
            foreach (static::Classes as $type) {
                DictClass::query()->create([
                    'dv' => $type['class']
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
