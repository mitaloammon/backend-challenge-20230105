<?php

namespace Tests\Feature;

use App\Http\Requests\StoreProductParserPost;
use App\Models\ProductParser;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_products_endpoint_get(): void
    {
        $products = ProductParser::factory(1)->create();

        $response = $this->getJson('/api/products');

        $response->assertStatus(200);
        $response->assertJsonCount(1);

        $response->assertJson(function (AssertableJson $json) use ($products) {
            $json->whereAllType([
                'data.0.id'               => 'integer',
                'data.0.code'             => 'integer',
                'data.0.status'           => 'string',
                'data.0.imported_t'       => 'string',
                'data.0.url'              => 'string',
                'data.0.creator'          => 'string',
                'data.0.created_t'        => '/\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}/|string',
                'data.0.last_modified_t'  => '/\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}/|string',
                'data.0.product_name'     => 'string',
                'data.0.quantity'         => 'string',
                'data.0.brands'           => 'string',
                'data.0.categories'       => 'string',
                'data.0.labels'           => 'string',
                'data.0.cities'           => 'string',
                'data.0.purchase_places'  => 'string',
                'data.0.stores'           => 'string',
                'data.0.ingredients_text' => 'string',
                'data.0.traces'           => 'string',
                'data.0.serving_size'     => 'string',
                'data.0.serving_quantity' => 'double',
                'data.0.nutriscore_score' => 'integer',
                'data.0.nutriscore_grade' => 'string',
                'data.0.main_category'    => 'string',
                'data.0.image_url'        => 'string'
            ]);

            $json->hasAll(
                [
                    'data.0.id',
                    'data.0.code',
                    'data.0.status',
                    'data.0.imported_t',
                    'data.0.url',
                    'data.0.creator',
                    'data.0.created_t',
                    'data.0.last_modified_t',
                    'data.0.product_name',
                    'data.0.quantity',
                    'data.0.brands',
                    'data.0.categories',
                    'data.0.labels',
                    'data.0.cities',
                    'data.0.purchase_places',
                    'data.0.stores',
                    'data.0.ingredients_text',
                    'data.0.traces',
                    'data.0.serving_size',
                    'data.0.serving_quantity',
                    'data.0.nutriscore_score',
                    'data.0.nutriscore_grade',
                    'data.0.main_category',
                    'data.0.image_url'
                ]
            );

            $product = $products->first();

            $json->whereAll([
                'data.0.id'             => $product->id,
                'data.0.code'             => $product->code,
                'data.0.status'           => $product->status,
                'data.0.imported_t'       => $product->imported_t,
                'data.0.url'              => $product->url,
                'data.0.creator'          => $product->creator,
                #'data.0.created_t'        => $product->created_t,
                #'data.0.last_modified_t'  => $product->last_modified_t,
                'data.0.product_name'     => $product->product_name,
                #'data.0.quantity'         => $product->quantity,
                'data.0.brands'           => $product->brands,
                'data.0.categories'       => $product->categories,
                'data.0.labels'           => $product->labels,
                'data.0.cities'           => $product->cities,
                'data.0.purchase_places'  => $product->purchase_places,
                'data.0.stores'           => $product->stores,
                'data.0.ingredients_text' => $product->ingredients_text,
                'data.0.traces'           => $product->traces,
                #'data.0.serving_size'     => $product->serving_size,
                'data.0.serving_quantity' => $product->serving_quantity,
                'data.0.nutriscore_score' => $product->nutriscore_score,
                'data.0.nutriscore_grade' => $product->nutriscore_grade,
                'data.0.main_category'    => $product->main_category,
                'data.0.image_url'        => $product->image_url
            ]);
        });
    }
}
