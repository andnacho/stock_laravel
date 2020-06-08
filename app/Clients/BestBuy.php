<?php

namespace App\Clients;

use App\Stock;
use Http;

class BestBuy implements Client
{
    public function checkAvailability(Stock $stock): StockStatus
    {
        $results = Http::get('http://foo.test')->json();

        return new StockStatus(
            $results['available'],
            $results['price']
        );
    }
}
