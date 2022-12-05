<?php

namespace App\Models;

use Illuminate\Support\Str;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Event extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

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

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('events')
            ->singleFile()
            ->registerMediaConversions(function (Media $media) {
                
            $this
                ->addMediaConversion('mini')
                ->width(250)
                ->height(250)
                ->apply()
                ->crop(Manipulations::CROP_TOP_LEFT, 250, 250)
                ->nonQueued();

            $this
                ->addMediaConversion('mid')
                ->fit(Manipulations::FIT_CROP, 750, 750)
                ->nonQueued();

            $this
                ->addMediaConversion('full')
                ->fit(Manipulations::FIT_CONTAIN, 1000, 1000)
                ->nonQueued();

            });
    }
}
