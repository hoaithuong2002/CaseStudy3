<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product();
        $product->name='hsdbfhsdj';
        $product->description='jh';
        $product->content='gadta';
        $product->price='123';
        $product->save();
    }
}
