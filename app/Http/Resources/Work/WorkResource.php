<?php

namespace App\Http\Resources\Work;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'title'=> $this->title,
            'writer'=> $this->writer,
            'genre'=> $this->genre,
            'category'=> $this->category,
            'date'=> $this->release_date,
            'description'=> $this->description,
            'reader'=> $this->reader,
            'page'=> $this->page,
            'collection'=> $this->collection,
            // 'image'=> $this->image,
        ];
    }
}
