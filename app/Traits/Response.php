<?php

namespace App\Traits;

trait Response
{
    public function ResponseOvertimePayCalculate($data)
    {
        foreach($data as $item){
            $results[] = [
                'id' => $item->id,
                'name' => $item->name,
                'salary' => $item->salary,
                'overtimes' => $overtime = $this->OvertimeDuration($item->overtimes),
                'overtimeDurationTotal' => array_sum(array_column($overtime,'overtimeDuration')) <= 0 ? 0 : array_sum(array_column($overtime,'overtimeDuration')) * 10000,
                'amount' => array_sum(array_column($overtime,'overtimeDuration')) <= 0 ? $item->salary : (array_sum(array_column($overtime,'overtimeDuration')) * 10000) + $item->salary
            ];
        }
        return $results;
    }
    public function OvertimeDuration($data)
    {
        foreach($data as $overtime){
            $result[] = [
                'id' => $overtime['id'],
                'date'=> date('d/m/Y', strtotime($overtime['date'])),
                'timeStarted' => date('H:i', strtotime($overtime['time_started'])),
                'timeEnded' => date('H:i', strtotime($overtime['time_ended'])),
                'overtimeDuration' => floor((strtotime($overtime['time_ended']) - strtotime($overtime['time_started'])) / (60 * 60))
            ];
        }
        return $result;
    }
}