<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AvailableBattleFields extends Model
{
    use HasFactory;

    protected $fillable = [
        'battle_id',
        'available_field_id'
    ];


}
