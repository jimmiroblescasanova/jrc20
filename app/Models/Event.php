<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $dates = ['date'];
    
    protected $fillable = [
        'title', 'slug', 'subtitle', 'summary', 'image', 'date',
    ];

    protected function shortSummary(): Attribute
    {
        return new Attribute(
            get: fn () => Str::limit($this->summary, 150, '...'),
        );
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopeSearch($query, $searchTerm)
    {
        $searchTerm = "%$searchTerm%";

        return $query->where('title', 'LIKE', $searchTerm)
            ->orWhere('subtitle', 'LIKE', $searchTerm)
            ->orWhere('summary', 'LIKE', $searchTerm);
    }
}
