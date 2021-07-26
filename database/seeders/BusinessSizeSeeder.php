<?php

namespace Database\Seeders;

use App\Models\BusinessSize;
use Illuminate\Database\Seeder;

class BusinessSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $businessSizes = [
            'Less than 5',
            '5 to 10',
            '10 to 20',
            '20 to 50',
            '50 to 100',
            'More than 100'
        ];

        foreach ($businessSizes as $size){
            BusinessSize::query()->create([
                'size' => $size
            ]);
        }
    }
}
