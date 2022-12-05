<?php

namespace Tests\Feature;

use App\Models\Employee;
use App\Models\Overtime;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OvertimeTest extends TestCase
{
    use RefreshDatabase;

    public function test_postOvertime()
    {
        $instance_1 = Employee::factory()->create();
        $instance_2 = Overtime::factory()->create(['employee_id' => $instance_1->id]);

        //check validate request
        $payload_1 = [
            'employee_id' => $instance_2->employee_id,
            'date' => $instance_2->date,
            'time_started' => "10:10",
            'time_ended' => "02:10"
        ];
        $res = $this->postJson('/api/overtimes',$payload_1);
        $res->assertStatus(422);
        
        //try to postOvertime
        $payload_2 = [
            'employee_id' => $instance_2->employee_id,
            'date' => "2022-12-07",
            'time_started' => "10:10",
            'time_ended' => "12:10"
        ];
        $res = $this->postJson('/api/overtimes',$payload_2);
        $res->assertStatus(200);
    }
    public function test_getOvertimePayCalculate()
    {
        $instance_1 = Employee::factory()->create();
        $instance_2 = Overtime::factory()->create(['employee_id' => $instance_1->id]);
        
        //data not found
        $payload_1 = "1111-01";
        $res = $this->getJson("/api/overtime-pays/calculate?month=$payload_1");
        $res->assertStatus(404);

        //try to get data with valid payload
        $payload_1 = substr($instance_2->date,0,7);
        $res = $this->getJson("/api/overtime-pays/calculate?month=$payload_1");
        $res->assertStatus(200);
    }
}
