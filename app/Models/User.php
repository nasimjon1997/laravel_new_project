<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    /**
     * Get the user that owns the phone.
     */
   public function post(): HasMany
    {
        return $this->HasMany(Post::class);
    }
}

