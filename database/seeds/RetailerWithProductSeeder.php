<?php

use App\Product;
use App\Retailer;
use App\Stock;
use Illuminate\Database\Seeder;

class RetailerWithProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $switch = Product::create(['name' => 'Nintendo Switch']);

        $bestBuy = Retailer::create(['name' => 'Best Buy']);

        $bestBuy->addStock($switch, new Stock([
            'price' => 10000,
            'url' => 'https://api.mercadolibre.com/sites/MCO/search?q=Diadema Bluetooth Diseño Gatito Calidad Garantizada',
            'sku' => 'Diadema Bluetooth Diseño Gatito Calidad Garantizada',
            'in_stock' => false
        ]));
    }
}
