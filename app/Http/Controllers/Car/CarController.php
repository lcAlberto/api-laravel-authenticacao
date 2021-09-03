<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use App\Models\Car;

class CarController extends Controller
{
    private $repository;
    private $model;

    public function __construct()
    {
        $this->model = new Car();
    }

    public function list()
    {
        return $this->model->all();
    }

    public function create(CarRequest $request)
    {
        $data = $request->validated();
        $car = $this->model->create($data);
        return response()->json([
            'status' => 'success',
            'data' => CarResource::make($car)
        ], 201);
    }

    public function view(Car $car)
    {
        return $car;
    }

    public function update(CarRequest $request, Car $car)
    {
        $data = $request->validated();
        $car = $car->update($data);
        return response()->json([
            'status' => 'success',
            'data' => CarResource::make($car)
        ], 201);
    }

    public function delete(Car $car)
    {
        try {
            $car->delete();
            return response()->json([
                'status' => 'success',
            ], 201);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'data' => $exception
            ], 500);
        }
    }
}
