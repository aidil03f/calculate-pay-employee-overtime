<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\{OvertimePayCalculateRequest,OvertimeRequest};
use App\Repositories\{EmployeeRepositoryInterface,OvertimeRepositoryInterface};
use App\Traits\Response;

class OvertimeController extends Controller
{
    use Response;

    private $repositoryOvertime, $repositoryEmployee;

    public function __construct(OvertimeRepositoryInterface $overtime,EmployeeRepositoryInterface $employee)
    {
        $this->repositoryOvertime = $overtime;
        $this->repositoryEmployee = $employee;
    }

     /**
     * @OA\Post(
     *      path="/api/overtimes",
     *      description="Create new Overtime.",
     *      tags={"Overtime"},
     *      @OA\RequestBody(@OA\JsonContent(ref="#components/schemas/Overtime")),
     *      @OA\Response(response=202, description="Created", @OA\JsonContent(ref="#components/schemas/Overtime")),
     * )
     *
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    public function store(OvertimeRequest $request)
    {
        $this->repositoryOvertime->Create($request->all());
        return response()->json(['status' => 'success','message' => 'Data created successfully']);
    }

    /**
     * @OA\Get(
     *     path="/api/overtime-pays/calculate",
     *     tags={"Calculate"},
     *     description="get overtime-pays calculate.",
     *     @OA\Parameter(name="month", in="query", description="Result filters separated by `params month`. Format: `date_format:Y-m`. Example=`2022-12`"),
     *     @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\JsonContent(
     *              oneOf={
     *                  @OA\Schema(type="array", @OA\Items(ref="#components/schemas/Overtime")),
     *                  @OA\Schema(
     *                      allOf={@OA\Schema(ref="#components/schemas/Overtime")},
     *                      @OA\Property(property="data", type="array", @OA\Items(ref="#components/schemas/Overtime")),
     *                  ),
     *              }
     *          )
     *      )
     * )
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function overtimePayCalculate(OvertimePayCalculateRequest $request)
    {
        $query = $this->repositoryEmployee->getOvertimeByMonthYear([
            'year' => substr($request->month,0,4),
            'month'=> substr($request->month,5,7)
        ]);

        if($query->count() == 0){
            return response()->json(['status' => 'error','data' => null],404);
        } else {
            return response()->json(['status' => 'success','data' => $this->ResponseOvertimePayCalculate($query)]);
        }
    }
}
