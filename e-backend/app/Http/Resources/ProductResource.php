<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $first_image
 * @property mixed $thumbnail
 * @property mixed $reviews
 * @property mixed $colors
 * @property mixed $description
 * @property mixed $price
 * @property mixed $qty
 * @property mixed $slug
 * @property mixed $name
 * @property mixed $sizes
 * @property mixed $second_image
 * @property mixed $third_image
 * @property mixed $status
 */
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
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'qty' => $this->qty,
            'price' => $this->price,
            'colors' => $this->colors,
            'sizes' => $this->sizes,
            'reviews' => $this->reviews,
            'status' => $this->status,
            'thumbnail' => asset($this->thumbnail),
            'first_image' => $this->first_image ? asset($this->first_image):null,
            'second_image' => $this->second_image ? asset($this->second_image):null,
            'third_image' => $this->third_image ? asset($this->third_image):null,

        ];
    }
}
