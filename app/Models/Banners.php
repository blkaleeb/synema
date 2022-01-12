<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    use HasFactory;

    protected $table = 'banners';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image', 'description', 'title', 'subtitle', 'name', 'songs_id', 'slug'
    ];

    public function songs()
    {
        return $this->belongsTo("App\Models\Songs");
    }
}
