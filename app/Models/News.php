<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Builder;

class News1 extends Pivot
{
    //
}
class News extends Model
{
    use HasFactory;

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

    protected $guarded = [];


    protected $fillable = [
        'title',
        'content',
        'slug',
        'cid',
        'uid',
        'status',
        'created',
        'modified'];

    public function post(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
