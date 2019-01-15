<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'=>$this->name,
            'Total_price' => round((1 - ($this->discount) / 100) * $this->price,2),
            'rating'=>$this->review->count()>0 ?round($this->review->sum('star')/$this->review->count(),2):'No rating yet',
            'discount'=>$this->discount     ,
            'href' => [
                'link' => route('product.show', $this->id)
            ],
        ];
    }
}
