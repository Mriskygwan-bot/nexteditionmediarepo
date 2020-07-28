<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Page extends JsonResource
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
            'ref'         => $this -> ref,
            'alias'       => $this -> alias,
            'description' => $this->description,
            'name'        => $this->name
        ];
    }
}
