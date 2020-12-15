<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ShipOrdersTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAllShipOrders()
    {
        $this->withoutMiddleware();
        $response = $this->get('/api/ship-orders');
        $response->assertStatus(200);
    }
}
