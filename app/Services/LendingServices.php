<?php

namespace App\Services;

use App\Models\Lending;
use Illuminate\Config\Repository;

class LendingServices extends Repository
{
    protected function getClass()
    {
        return Lending::class;
    }

    public function setUserToLending($data)
    {
//        $data['user_id'] = auth()->user()->id;
        $data['user_id'] = 1;
        return $data;
    }
}
