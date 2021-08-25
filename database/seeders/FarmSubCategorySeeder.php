<?php

namespace Database\Seeders;

use App\Models\FarmSubCategory;
use Illuminate\Database\Seeder;

class FarmSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $farms = [
            '1' => ['Turkey','Ducks', 'Geese', 'Guinea Fowl', 'Quail', 'Chicken'],
            '2' => ['Wheat', 'Rice', 'Maize', 'Barley', 'Oats', 'Rye', 'Millet', 'Sorghum', 'Buckwheat', 'Mixed grains'],
            '3' => ['Cattle', 'Sheep', 'Pigs', 'Goats'],
            '4' => ['Cassava', 'Sweet Potatoes', 'Yam', 'Cocoyam'],
            '5' => ['Pineapples', 'Oranges', 'Banana', 'Mango', 'Guava', 'Sugarcane', 'Grapes', 'Coconut', 'Tomato', 'Watermelon'],
            '6' => ['Onion', 'Shallots', 'Okra', 'Eggplant', 'Sweet pepper', 'Carrots', 'Cabbage', 'Chili Pepper', 'Hot Pepper'],
            '7' => ['Tilapia', 'Catfish', 'Salmon', 'Tuna', 'Eel']
        ];

        foreach ($farms as $farm => $sub_farms){
            foreach ($sub_farms as $sub_farm){
                FarmSubCategory::query()->create([
                    'farm_category_id' => $farm,
                    'name' => $sub_farm
                ]);
            }
        }
    }
}
