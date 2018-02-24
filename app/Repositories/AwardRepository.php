<?php

namespace App\Repositories;

use App\Models\Awards;

class AwardRepository
{

    public $model;

    public function __construct(Awards $model)
    {
        $this->model = $model;
    }

}
