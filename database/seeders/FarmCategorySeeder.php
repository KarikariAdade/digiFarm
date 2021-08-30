<?php

namespace Database\Seeders;

use App\Models\FarmCategory;
use Illuminate\Database\Seeder;

class FarmCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $farms = [
            'Poultry',
            'Grains',
            'Mammals',
            'Tubers',
            'Fruits',
            'Vegetables',
            'Fish Farming'
        ];

        foreach ($farms as $farm) {
            if ($farm === 'Grains' || $farm === 'Fruits' || $farm === 'Tubers' || $farm === 'Vegetables'){
                FarmCategory::query()->create([
                    'name' => $farm,
                    'is_crop' => true
                ]);
            }else{
                FarmCategory::query()->create(['name' => $farm]);
            }
        }
    }
}
