<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SkiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

     public static $wrap='ski';
    public function toArray($request)
    {
        return [
            'model'=> $this -> resource->model,
            'color'=> $this -> resource->color,
            'length' => $this -> resource->length,
            'brand_id'=> new BrandResource($this -> resource->brand),
            'type_id'=>new TypeResource($this -> resource->type),
            'user_id'=>new UserResource($this -> resource->user)
        ];
    }
}