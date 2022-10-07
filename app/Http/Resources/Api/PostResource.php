<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
                "id" => $this->id,
                "user_id" => $this->user_id,
                "category_id" => $this->category_id,
                "title" => $this->title,
                "slug" => $this->slug,
                "is_published" => $this->is_published,
                "content" => $this->content,
                "thumb" => '/storage/'. $this->thumb,
                "created_at" => $this->created_at,
                "updated_at" => $this->updated_at,
                "category" => $this->category,
                "tags" => $this->tags,
                "author" => $this->author,
            
            ];
        }
        
}
