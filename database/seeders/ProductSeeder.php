<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $daikon = new Product;
        $daikon->name = 'だいこん';
        $daikon->price = 150;
        $daikon->save();

        $ninjin = new Product;
        $ninjin->name = 'にんじん';
        $ninjin->price = 100;
        $ninjin->save();

        $negi = new Product;
        $negi->name = 'ネギ';
        $negi->price = 80;
        $negi->save();
    }
}
