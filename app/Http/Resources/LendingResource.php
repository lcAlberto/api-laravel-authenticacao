<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LendingResource extends JsonResource
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
            'value' => $this->value,
            'start_date' => date_format($this->start_date, 'd/m/Y h:m'),
            'return_date' => date_format($this->return_date, 'd/m/Y h:m'),
            'car' => $this->car->name,
            'car_id' => $this->car_id,
            'user' => $this->user->name,
            'user_id' => $this->user_id,
            'links' => [
                'edit' => $this->when(true, route('lending.edit', $this->id)),
                'show' => $this->when(true, route('lending.show', $this->id)),
                'destroy' => $this->when(true, route('lending.destroy', $this->id)),
            ],
        ];
    }
}
