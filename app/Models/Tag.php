<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected function name(): Attribute
    {
        return new Attribute(
            set: fn ($value) => Str::lower($value),
        );
    }

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
}
