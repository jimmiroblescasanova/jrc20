<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Client extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'lastname', 'email', 'company', 'unsuscribe_at'];

    protected $dates = ['unsuscribe_at'];
}
