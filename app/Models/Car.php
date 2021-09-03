<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory, HasFactory;

    protected $fillable = [
        'model', 'brand', 'color', 'year', 'vehicle_nameplate', 'description',
    ];

    public function lending()
    {
        return $this->hasOne(Lending::class);
    }
}
