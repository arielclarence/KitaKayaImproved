<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Queue\DatabaseQueue;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = "user";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = [
        'email',
        'password',
        'nama',
        'umur',
        'role',
        'status',
    ];
}
