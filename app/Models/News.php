<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'category',
        'featured',
        'region',
        'seo_title',
        'slug',
        'multiple_titles',
        'meta_description',
    ];

    protected $casts = [
        'category'         => 'array',
        'region'           => 'array',
        'multiple_titles'  => 'array',
    ];
}
