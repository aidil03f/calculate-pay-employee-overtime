<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      title="Employee",
 *      required={"name","salary"},
 *      @OA\Property(property="id", type="int", readOnly=true),
 *      @OA\Property(property="name", type="string"),
 *      @OA\Property(property="salary", type="int"),
 *      @OA\Property(property="created_at", type="datetime", readOnly=true),
 *      @OA\Property(property="updated_at", type="datetime", readOnly=true),
 *      @OA\Property(property="overtimes", allOf={@OA\Schema(ref="#components/schemas/Overtime")}, readOnly=true),
 * )
 */
class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = ['name','salary'];

    public function overtimes()
    {
        return $this->hasMany(Overtime::class,'employee_id');
    }
}
