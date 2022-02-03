<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Songs extends Model
{
    use HasFactory;

    protected $table = 'songs';

    protected $fillable = [
        'title', 'genre', 'artist', 'likes', 'song', 'group', 'image'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    public static function group()
    {
        return [
            0 => 'Seynema',
            1 => 'Verse',
        ];
    }
}
