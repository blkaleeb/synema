<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'title', 'slug', 'image', 'subtitle', 'description'
    ];

    public function category()
    {
        return $this->belongsTo("App\Models\ArticleCategory");
    }

    public function tags()
    {
        return $this->hasMany("App\Models\ArticleTag");
    }
}
