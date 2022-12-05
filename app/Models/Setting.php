<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      title="Setting",
 *      required={"key","value"},
 *      @OA\Property(property="id", type="int", readOnly=true),
 *      @OA\Property(property="key", type="string"),
 *      @OA\Property(property="value", type="int"),
 *      @OA\Property(property="created_at", type="datetime", readOnly=true),
 *      @OA\Property(property="updated_at", type="datetime", readOnly=true),
 * )
 */

class Setting extends Model
{
    use HasFactory;
    protected $table = 'settings';
    protected $fillable = ['key','value'];
}
