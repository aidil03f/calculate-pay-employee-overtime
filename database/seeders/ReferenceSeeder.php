<?php

namespace Database\Seeders;

use App\Models\Reference;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class ReferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'code' => Str::random(20),
                'name' => 'Salary / 173',
                'expression' => 5000000 * 1,
            ],
            [
                'code' => Str::random(20),
                'name' => 'Fixed',
                'expression' => 10000 * 1,
            ],
        ])->each(function($data){
            Reference::create($data);
        });
    }
}
