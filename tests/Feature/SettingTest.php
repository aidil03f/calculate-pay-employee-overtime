<?php

namespace Tests\Feature;

use App\Models\Reference;
use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SettingTest extends TestCase
{
    use RefreshDatabase;

    public function test_updateSetting()
    {
        $instance_1 = Reference::factory()->create();
        $instance_2 = Setting::factory()->create(['key' => $instance_1->code,'value'=> 1]);
        $payload_1 = [
            'key' => 'abcdefg',
            'value' => 1,
        ];
        $payload_2 = [
            'key' => $instance_2->key,
            'value' => 0,
        ];
        $res = $this->patchJson("/api/settings", $payload_1);
        $res->assertStatus(404);
        $res = $this->patchJson("/api/settings", $payload_2);
        $res->assertStatus(200);
    }
}
