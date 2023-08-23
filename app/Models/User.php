<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    /**
     * Get the user that owns the phone.
     */
   public function category(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'news', 'user.id', 'category.id');
    }
}

