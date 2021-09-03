<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Config\Repository;
use Illuminate\Support\Facades\Hash;

class UserRepository extends Repository
{
    protected function getClass()
    {
        return User::class;
    }

    public function hashUser($data)
    {
        $data['password'] = Hash::make($data['password']);
        return $data;
    }
}
