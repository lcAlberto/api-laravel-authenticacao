<?php

namespace App\Http\Controllers\Lending;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Lending;
use Illuminate\Http\Request;

class QueriesController extends Controller
{
    private $lendingModel;
    private $carModel;

    public function __construct()
    {
        $this->lendingModel = new Lending();
        $this->carModel = new Car();
    }
    public function getAllLendingCar()
    {
        dd('KI');
        $result = $this->lendingModel->car()->whereHas('car');
        dd($result);
//        return Lending::query()->where('car_id', '=', 1);
    }

    public function verifyCarIsLending(Car $car)
    {
        return Lending::query()->where('verifyCarIsLending', 'like', strval($car['id']));
    }
}
