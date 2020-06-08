<?php

namespace App\Clients;

use App\Stock;

class Target implements Client
{
    /**
     * @param Stock $stock
     */
    public function checkAvailability(Stock $stock): StockStatus
    {
    }
}
