<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Repositories\EmployeeRepositoryInterface;

class EmployeeController extends Controller
{
    private $employeeRepository;

    public function __construct(EmployeeRepositoryInterface $employee)
    {
        $this->employeeRepository = $employee;
    }
     /**
     * @OA\Post(
     *      path="/api/employees",
     *      description="Create new Employee.",
     *      tags={"Employee"},
     *      @OA\RequestBody(@OA\JsonContent(ref="#components/schemas/Employee")),
     *      @OA\Response(response=202, description="Created", @OA\JsonContent(ref="#components/schemas/Employee")),
     * )
     *
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(EmployeeRequest $request)
    {
        $this->employeeRepository->Create($request->all());
        return response()->json(['status' => 'success']);
    }
}
