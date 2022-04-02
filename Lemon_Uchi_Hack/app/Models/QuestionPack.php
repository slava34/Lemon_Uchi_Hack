<?php

namespace App\Models;

use App\Models\Dictionaries\DictClass;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class QuestionPack extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dict_class_id'
    ];

    public function class(): BelongsTo
    {
        return $this->belongsTo(DictClass::class,'dict_class_id','id');
    }

}
