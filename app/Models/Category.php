<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'slug'];
    public $timestamps = false;

    public function post(): BelongsTo
    {
        return $this->belongsTo(News::class);
    }
}

