<?php

namespace Database\Seeders;

use App\Models\Reference;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $key = Reference::get('code');
        collect([
            [
                'key'  => $key[0]['code'],
                'value'=> 1
            ],
            [
                'key' => $key[1]['code'],
                'value'=> 1
            ]
        ])->each(function($data){
            Setting::create($data);
        });
    }
}
