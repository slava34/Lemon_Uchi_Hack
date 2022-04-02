<?php

namespace App\Models;

use App\Models\Dictionaries\DictQuestionLevels;
use App\Models\Dictionaries\DictQuestionTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'question_id',
        'is_correct'

    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class,'question_id','id');
    }


}
