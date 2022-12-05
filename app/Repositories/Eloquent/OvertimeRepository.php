<?php

namespace App\Repositories\Eloquent;

use App\Models\Overtime;
use App\Repositories\OvertimeRepositoryInterface;

class OvertimeRepository implements OvertimeRepositoryInterface
{
    private $model;

    public function __construct(Overtime $model)
    {
        $this->model = $model;
    }

    public function Create(array $attributes)
    {
        $data = $this->model->create($attributes);
        return $data;
    }
}