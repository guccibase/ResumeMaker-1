<?php

namespace App\Repositories;

use App\Models\Skills;

class SkillRepository
{

    public $model;

    public function __construct(Skills $model)
    {
        $this->model = $model;
    }

}
