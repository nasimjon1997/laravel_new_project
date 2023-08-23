<?php

namespace App\Models;

use App\Http\Controllers\NewController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = ['title', 'description', 'slug'];
    public $timestamps = false;

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->using(News1::class);
    }
}

