<?php

namespace Tests\Clients;

use App\Clients\BestBuy;
use App\Stock;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BestBuyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_tracks_a_product()
    {
        // given I have a producto
        $this->seed(\RetailerWithProductSeeder::class);

        $stock = Stock::first();
        // with stock
        // if a use mercado libre to trabk that stock
        try {
            $stockStatus = (new BestBuy())->checkAvailability($stock);
        } catch (\Exception $e) {
            $this->fail('Failed to charge Api');
        }

        $this->assertTrue(true);

    }
}
