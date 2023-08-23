<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class PostFilter extends QueryFilter{
   public function post_id($id = null){
        return $this->builder->when($id, function($query) use($id){
            $query->where('post_id', $id);
        });
    }

    public function search_field($search_string = ''){
        return $this->builder
            ->where('title', 'LIKE', '%'.$search_string.'%')
            ->orWhere('content', 'LIKE', '%'.$search_string.'%');
    }
}
