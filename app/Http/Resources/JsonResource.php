<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->ID,
            'title' => $this->post_title,
            'content' => $this->post_content,
            'created' => $this->post_created,
            'category' => $this->post_title,
        ];
    }
}
