<?php

use App\Http\Controllers\API\{EmployeeController,OvertimeController,SettingController};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::patch('/settings',[SettingController::class,'update']);

Route::post('/employees',[EmployeeController::class,'store']);

Route::post('/overtimes',[OvertimeController::class,'store']);

Route::get('/overtime-pays/calculate',[OvertimeController::class,'overtimePayCalculate']);