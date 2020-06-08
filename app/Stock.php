<?php

namespace App;

use App\Clients\BestBuy;
use App\Clients\ClientException;
use Facades\App\Clients\ClientFactory;
use App\Clients\Target;
use Http;

class Stock extends Model
{
    protected $table = 'stock';
    protected $casts = [
        'in_stock' => 'boolean'
    ];

    public function track()
    {
        $status = $this->retailer
            ->client()
            ->checkAvailability($this);

        $this->update([
            'in_stock' => $status->available,
            'price' => $status->price
        ]);
    }

    public function retailer()
    {
        return $this->belongsTo(Retailer::class);

    }




}
