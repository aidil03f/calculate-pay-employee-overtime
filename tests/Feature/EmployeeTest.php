<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;

    public function test_postEmployee()
    {
        $payload_1 = ['name' => 'jojo','salary' => 6000000];
        $payload_2 = ['name' => 'test','salary' => 20000];
        $res = $this->postJson('/api/employees',$payload_1);
        $res->assertStatus(200);
        $res = $this->postJson('/api/employees',$payload_1);
        $res->assertStatus(422);
        $res = $this->postJson('/api/employees',$payload_2);
        $res->assertStatus(422);
    }
}
