<?php

namespace App\Repositories;

use App\Models\Interests;

class InterestRepository
{

    public $model;

    public function __construct(Interests $model)
    {
        $this->model = $model;
    }

}
