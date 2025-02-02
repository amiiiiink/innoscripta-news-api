<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

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
