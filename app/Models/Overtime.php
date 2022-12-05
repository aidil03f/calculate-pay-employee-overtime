<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      title="Overtime",
 *      required={"employee_id", "date", "time_started", "time_ended"},
  *     @OA\Property(property="id", type="int", readOnly=true),
 *      @OA\Property(property="employee_id", type="int"),
 *      @OA\Property(property="date", type="datetime"),
 *      @OA\Property(property="time_started", type="datetime"),
 *      @OA\Property(property="time_ended", type="datetime"),
 *      @OA\Property(property="created_at", type="datetime", readOnly=true),
 *      @OA\Property(property="updated_at", type="datetime", readOnly=true),
 *      @OA\Property(property="employee", allOf={@OA\Schema(ref="#components/schemas/Employee")}, readOnly=true),
 * )
 */
class Overtime extends Model
{
    use HasFactory;
    protected $table = 'overtimes';
    protected $fillable = ['employee_id','date','time_started','time_ended'];

    public function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id');
    }
}
