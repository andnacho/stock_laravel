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
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Retailer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Retailer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Retailer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Retailer whereUpdatedAt($value)
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
