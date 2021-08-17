<?php

namespace Database\Seeders;

use App\Models\BusinessType;
use Illuminate\Database\Seeder;

class BusinessTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type =  [
            'Retail Trade',
            'Wholesale Trade',
            'Other Services',
            'Manufacturing',
            'Healthcare and Dietitian'
        ];

        foreach ($type as $item) {
            BusinessType::query()->create([
                'name' => $item
            ]);
        }
    }
}
