<?php

namespace App\Models;

use App\Models\Dictionaries\DictQuestionLevels;
use App\Models\Dictionaries\DictQuestionTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class BattleField extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'field_id',
        'whos_field_id',
        'battle_id',
    ];

    public function battle(): BelongsTo
    {
        return $this->belongsTo(Battle::class,'battle_id','id');
    }

}
