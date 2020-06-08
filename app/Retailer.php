<?php

namespace App;

use Facades\App\Clients\ClientFactory;

/**
 * App\Retailer
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Stock[] $stock
 * @property-read int|null $stock_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Retailer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Retailer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Retailer query()
 * @mixin \Eloquent
 */
class Retailer extends Model
{
    public function addStock(Product $product, Stock $stock)
    {
        $stock->product_id = $product->id;

        $this->stock()->save($stock);
    }

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }

    public function client()
    {
        return ClientFactory::make($this);
    }
}
