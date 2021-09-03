<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\UserRepository;
use Exception;

class UserController extends Controller
{
    private $repository;
    private $model;

    public function __construct()
    {
        $this->repository = new UserRepository();
        $this->model = new User();
    }

    public function list()
    {
        return $this->model->all();
    }

    public function create(UserRequest $request)
    {
        $data = $request->validated();
        $user = $this->repository->hashUser($data);
        $user = $this->model->create($user);

        return response()->json([
            'status' => 'success',
            'data' => UserResource::make($user)
        ], 201);
    }

    public function view(User $user)
    {
        return $user;
    }

    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();
        $data = $this->repository->hashUser($data);
        $user = $user->update($data);
        return response()->json([
            'status' => 'success',
            'data' => UserResource::make($user)
        ], 201);
    }

    public function delete(User $user)
    {
        try {
            $user->delete();
            return response()->json([
                'status' => 'success',
            ], 201);
        } catch (Exception $exception) {
            return response()->json([
                'status' => 'error',
                'data' => $exception
            ], 500);
        }
    }

}
