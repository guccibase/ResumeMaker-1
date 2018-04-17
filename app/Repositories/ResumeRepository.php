<?php

namespace App\Repositories;

use App\Models\Resumes;

class ResumeRepository
{

    public $model;

    public function __construct(Resumes $model)
    {
        $this->model = $model;
    }

    public function findUser($userId)
    {
        $res = $this->model->where('user_id', $userId)->orderBy('id', 'DESC')->first();

        if ($res)
            return $res->id;
        return false;
    }

}
