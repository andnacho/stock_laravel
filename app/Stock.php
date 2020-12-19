<?php

namespace App;

use App\Clients\BestBuy;
use App\Clients\ClientException;
use Facades\App\Clients\ClientFactory;
use App\Clients\Target;
use Http;

/**
 * App\Stock
 *
 * @property int $id
 * @property int $product_id
 * @property int $retailer_id
 * @property int $price
 * @property string $sku
 * @property string $url
 * @property bool $in_stock
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Retailer $retailer
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Stock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Stock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Stock query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Stock whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Stock whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Stock whereInStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Stock wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Stock whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Stock whereRetailerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Stock whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Stock whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Stock whereUrl($value)
 * @mixin \Eloquent
 */
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
