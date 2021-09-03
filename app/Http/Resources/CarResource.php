<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
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
            'model' => $this->model,
            'brand' => $this->brand,
            'color' => $this->color,
            'year' => $this->year,
            'vehicle_nameplate' => $this->vehicle_nameplate,
            'description' => $this->description,

            'links' => [
                'edit' => $this->when(true, route('cars.edit', $this->id)),
                'show' => $this->when(true, route('cars.show', $this->id)),
                'destroy' => $this->when(true, route('cars.destroy', $this->id)),
            ],
        ];
    }
}
