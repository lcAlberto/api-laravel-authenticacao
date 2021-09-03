<?php

namespace App\Http\Controllers\Lending;

use App\Http\Requests\LendingRequest;
use App\Models\Lending;
use App\Http\Controllers\Controller;
use App\Services\LendingServices;

class LendingController extends Controller
{
    private $model;
    private $service;

    public function __construct()
    {
        $this->model = new Lending();
        $this->service = new LendingServices();
    }

    public function list()
    {
        return $this->model->all();
    }

    public function create(LendingRequest $request)
    {
        $data = $request->validated();
        $data = $this->service->setUserToLending($data);
        $lending = $this->model->create($data);
        return response()->json([
            'status' => 'success',
            'data' => LendingResource::make($lending)
        ], 201);
    }

    public function view(Lending $lending)
    {
        return $lending;
    }

    public function update(LendingRequest $request, Lending $lending)
    {
        $data = $request->validated();
        $data = $this->service->setUserToLending($data);
        $lending = $lending->update($data);
        return response()->json([
            'status' => 'success',
            'data' => LendingResource::make($lending)
        ], 201);
    }

    public function delete(Lending $lending)
    {
        try {
            $lending->delete();
            return response()->json([
                'status' => 'success',
            ], 201);
            return 'success';
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'success',
                'data' => $exception
            ], 500);
        }
    }
}
