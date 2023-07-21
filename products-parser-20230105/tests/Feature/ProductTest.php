<?php

namespace Tests\Feature;

use App\Http\Requests\StoreProductParserPost;
use App\Models\ProductParser;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_products_endpoint_get(): void
    {
        ProductParser::factory(1)->create();

        $response = $this->getJson('/api/products');

        $response->assertStatus(200);
        $response->assertJsonCount(1);
    }
}
