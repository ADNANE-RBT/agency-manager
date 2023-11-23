<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Staff extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'password',
        'agency_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function agency() {
        return $this->belongTo(Agency::class);
    }
}
