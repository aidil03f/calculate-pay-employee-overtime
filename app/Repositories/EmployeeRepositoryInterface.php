<?php

namespace App\Repositories;

interface EmployeeRepositoryInterface
{
    public function Create(array $attributes);
    public function getOvertimeByMonthYear(array $attributes);
}