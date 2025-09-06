<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',       // 👈 muy importante
        'parent_id',  // 👈 necesario para padre-hijo
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // 👉 Relación: un padre tiene muchos hijos
    public function hijos()
    {
        return $this->hasMany(User::class, 'parent_id', 'id');
    }

    // 👉 Relación: un hijo pertenece a un padre
    public function padre()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    public function consumos()
    {
        return $this->hasMany(Consumo::class);
    }

}
