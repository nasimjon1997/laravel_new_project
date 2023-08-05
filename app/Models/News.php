<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'slug',
        'cid',
        'uid',
        'status',
        'created',
        'modified'];
    protected $dateFormat = 'U';

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

    public function post(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function posts(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
