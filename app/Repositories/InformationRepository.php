<?php

namespace App\Repositories;

use App\Models\Informations;

class InformationRepository
{

    public $model;

    public function __construct(Informations $model)
    {
        $this->model = $model;
    }

}
