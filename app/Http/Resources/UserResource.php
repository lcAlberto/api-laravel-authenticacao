<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => date_format($this->created_at, 'd/m/Y H:m'),
            'updated_at' => date_format($this->updated_at, 'd/m/Y H:m'),

            'links' => [
                'edit' => $this->when(true, route('user.edit', $this->id)),
                'show' => $this->when(true, route('user.show', $this->id)),
                'destroy' => $this->when(true, route('user.destroy', $this->id)),
            ],
        ];
    }
}
