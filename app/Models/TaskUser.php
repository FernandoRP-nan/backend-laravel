<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TaskUser extends Pivot
{
    use HasFactory;

    //solo a la pivote se le pone true, y no a los modelos normales el $incrementing
    public $incrementing = true;

    protected $fillable = [
        'due_date',
        'user_id',
        'task_id',
        'state_id'
    ];


    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

}
