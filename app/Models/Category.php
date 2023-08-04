<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'slug'];
    public $timestamps = false;

    public function post(): HasOne
    {
        return $this->hasOne(Post::class);
    }
}

