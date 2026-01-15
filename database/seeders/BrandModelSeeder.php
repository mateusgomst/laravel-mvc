<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\BrandModel;
use Illuminate\Database\Seeder;

class BrandModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = Brand::all();

        foreach ($brands as $brand) {
            BrandModel::factory()->count(10)->create([
                'brand_id' => $brand->id,
            ]);
        }
    }
}
