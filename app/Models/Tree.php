<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tree extends Model
{
    use HasFactory;

    protected $table = "tree";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["judul", "link", "click", "urutan"];
}
