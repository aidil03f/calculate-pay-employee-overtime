<?php

namespace App\Repositories\Eloquent;

use App\Models\Employee;
use App\Repositories\EmployeeRepositoryInterface;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    private $model;

    public function __construct(Employee $model)
    {
        $this->model = $model;
    }

    public function Create(array $attributes)
    {
        $data = $this->model->create($attributes);
        return $data;
    }
    public function getOvertimeByMonthYear(array $attributes)
    {
        $query = $this->model->with('overtimes')->whereHas('overtimes', function($q) use ($attributes){
            $q->whereYear('date',$attributes['year'])->whereMonth('date',$attributes['month']);
        })->get();
        return $query;
    }
}