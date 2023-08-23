<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;


class Post extends Model
{
    use HasFactory;

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

    protected $dateFormat = 'd/m/Y H:i:s';

    protected $fillable = [
        'title',
        'content',
        'created',
        'cid'
    ];

    protected $guarded = [];

    public function scopeFilter(Builder $builder, QueryFilter $filter){
        return $filter->apply($builder);
    }
}
