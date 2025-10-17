<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'excerpt',
        'body',
        'image_path',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    protected $appends = [
        'image_url',
        'display_date',
    ];

    public function getImageUrlAttribute(): string
    {
        if ($this->image_path && Storage::disk('public')->exists($this->image_path)) {
            return Storage::url($this->image_path);
        }

        return 'https://placehold.co/600x400/fecaca/991b1b?text=SMKN+1+Surabaya';
    }

    public function getDisplayDateAttribute(): string
    {
        return optional($this->published_at ?? $this->created_at)->translatedFormat('d M Y');
    }
}
