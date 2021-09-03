<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    private $repository;
    private $model;

    public function __construct()
    {
        $this->repository = new UserRepository();
        $this->model = new User();
    }
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        dd($data);
        if(Auth::attempt($data)) {
            return response()->json([
                'message' => 'Invalid logout!!'
            ], 401);
        }
        $data = $this->repository->hashUser($data);
        $user = $this->model->create($data);

        $token = optional(auth()->user()
            ->createToken('token-api', ['server:update']))->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
}
