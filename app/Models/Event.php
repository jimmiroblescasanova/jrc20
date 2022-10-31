<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $dates = ['date'];
    protected $casts = [
        'date' => 'date:d-m-Y',
    ];

    protected function shortSummary(): Attribute
    {
        return new Attribute(
            get: fn () => Str::limit($this->summary, 150, '...'),
        );
    }
}
