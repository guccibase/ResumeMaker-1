<?php

namespace App\Repositories;

use App\Models\Users;

class UserRepository
{

    public $model;

    public function __construct(Users $model)
    {
        $this->model = $model;
    }

}
