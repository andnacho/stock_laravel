<?php

namespace App\Clients;

use App\Stock;
use Http;

class BestBuy implements Client //MecadoLibre en este caso
{
    public function checkAvailability(Stock $stock): StockStatus
    {
        $results = $this->endpoint($stock->sku);

        if (isset($results["results"])) {
            $stock->update(['url' => $results["results"][0]["permalink"]]);
        }
        return new StockStatus(
            $results["results"][0]['available_quantity'] > 0,
            $results["results"][0]['price']
        );
    }

    /**
     * @param $sku
     * @return array|mixed
     */
    protected function endpoint($sku)
    {
        return Http::get("https://api.mercadolibre.com/sites/MCO/search?q={$sku}")->json();
    }
}
