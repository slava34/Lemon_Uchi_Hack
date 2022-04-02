<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Battle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'pack_id',
        'team_id',
        'second_team_id',
        'is_playing',
        'whos_round',
        'second_team_balls',
        'first_team_balls'
    ];

    public function pack(): BelongsTo
    {
        return $this->belongsTo(QuestionPack::class,'pack_id','id');
    }
    public function team(): BelongsTo
    {
        return $this->belongsTo(Teams::class,'team_id','id');
    }
    public function second_team(): BelongsTo
    {
        return $this->belongsTo(Teams::class,'second_team_id','id');
    }
}
