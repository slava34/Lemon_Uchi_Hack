<?php

namespace App\Models\Dictionaries;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class DictQuestionLevels extends Model
{
    use HasFactory;

    protected $fillable = [
        'dv'
    ];


}
