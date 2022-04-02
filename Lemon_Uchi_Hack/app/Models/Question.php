<?php

namespace App\Models;

use App\Models\Dictionaries\DictQuestionLevels;
use App\Models\Dictionaries\DictQuestionTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'question_pack_id',
        'question_level_id',
        'question_type_id',
        'time'
    ];

    public function level(): BelongsTo
    {
        return $this->belongsTo(DictQuestionLevels::class,'question_level_id','id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(DictQuestionTypes::class,'question_type_id','id');
    }

    public function pack(): HasMany
    {
        return $this->hasMany(QuestionPack::class,'question_pack_id','id');
    }
    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class,'question_id','id');
    }

}
