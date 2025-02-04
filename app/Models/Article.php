<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Article extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'articles';

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];
    protected $fillable = [
        'title',
        'content',
        'description',
        'url',
        'url_to_image',
        'published_at',
        'source',
        'author',
        'category',
    ];

}
