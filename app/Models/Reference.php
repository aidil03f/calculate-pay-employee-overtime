<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      title="Reference",
 *      required={"code", "name","expression"},
 *      @OA\Property(property="id", type="int", readOnly=true),
 *      @OA\Property(property="code", type="string"),
 *      @OA\Property(property="name", type="string",enum={"Salary / 173", "Fixed"}),
 *      @OA\Property(property="expression", type="string"),
 *      @OA\Property(property="created_at", type="datetime", readOnly=true),
 *      @OA\Property(property="updated_at", type="datetime", readOnly=true),
 * )
 */

class Reference extends Model
{
    use HasFactory;
    protected $table = 'references';
    protected $fillable = ['code','name','expression'];
}
