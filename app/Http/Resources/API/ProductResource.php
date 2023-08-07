<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'productName' => $this->product_name,
            'description' => $this->description,
            'amount' => $this->amount,
            'price' => $this->price,
            'buy' => $this->buy,
            'createdAt' => $this->created_at,
        ];
    }
}
