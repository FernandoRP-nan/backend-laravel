<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'last_name',
        'second_last_name',
        'email',
        'password'
    ];

    protected $appends = ['full_name', 'last_names'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function todos()
    {
        return $this->hasMany(Todo::class);
    }

    public function tasks(): BelongsToMany
    {
        return $this->belongsToMany(Task::class)
            ->using(TaskUser::class);
    }

    public function getFullNameAttribute() : string
    {
        return "{$this->name} {$this->last_name} {$this->second_last_name}";
    }

    public function getToDoListAttribute()
    {
        return $this->todos();
    }


    public function getLastNameAttribute() : string
    {
        return "{$this->last_name} {$this->second_last_name}";
    }

}
