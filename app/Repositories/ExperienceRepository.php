<?php

namespace App\Repositories;

use App\Models\Experiences;

class ExperienceRepository
{

    public $model;

    public function __construct(Experiences $model)
    {
        $this->model = $model;
    }

}
