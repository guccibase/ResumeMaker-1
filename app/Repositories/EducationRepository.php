<?php

namespace App\Repositories;

use App\Models\Educations;

class EducationRepository
{

    public $model;

    public function __construct(Educations $model)
    {
        $this->model = $model;
    }

}
