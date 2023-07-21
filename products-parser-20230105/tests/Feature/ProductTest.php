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
                'data.0.code'             => $product->code,
                'data.0.status'           => $product->status,
                'data.0.imported_t'       => $product->imported_t,
                'data.0.url'              => $product->url,
                'data.0.creator'          => $product->creator,
                #'data.0.created_t'       => $product->created_t,
                #'data.0.last_modified_t' => $product->last_modified_t,
                'data.0.product_name'     => $product->product_name,
                #'data.0.quantity'        => $product->quantity,
                'data.0.brands'           => $product->brands,
                'data.0.categories'       => $product->categories,
                'data.0.labels'           => $product->labels,
                'data.0.cities'           => $product->cities,
                'data.0.purchase_places'  => $product->purchase_places,
                'data.0.stores'           => $product->stores,
                'data.0.ingredients_text' => $product->ingredients_text,
                'data.0.traces'           => $product->traces,
                'data.0.serving_size'     => $product->serving_size,
                'data.0.serving_quantity' => $product->serving_quantity,
                'data.0.nutriscore_score' => $product->nutriscore_score,
                'data.0.nutriscore_grade' => $product->nutriscore_grade,
                'data.0.main_category'    => $product->main_category,
                'data.0.image_url'        => $product->image_url
            ]);
        });
    }

    public function test_products_endpoint_get_id(): void
    {
        $product = ProductParser::factory(1)->createOne();
        $response = $this->getJson('/api/products/' . $product->id);
        $response->assertStatus(200);

        $response->assertJson(function (AssertableJson $json) use ($product) {
            //dd($json);

            $json->hasAll(
                [
                    #'data.id',
                    'data.code',
                    'data.status',
                    'data.imported_t',
                    'data.url',
                    'data.creator',
                    'data.created_t',
                    'data.last_modified_t',
                    'data.product_name',
                    'data.quantity',
                    'data.brands',
                    'data.categories',
                    'data.labels',
                    'data.cities',
                    'data.purchase_places',
                    'data.stores',
                    'data.ingredients_text',
                    'data.traces',
                    'data.serving_size',
                    'data.serving_quantity',
                    'data.nutriscore_score',
                    'data.nutriscore_grade',
                    'data.main_category',
                    'data.image_url'
                ]
            );

            $json->whereAllType([
                'data.id'               => 'integer',
                'data.code'             => 'integer',
                'data.status'           => 'string',
                'data.imported_t'       => 'string',
                'data.url'              => 'string',
                'data.creator'          => 'string',
                'data.created_t'        => '/\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}/|string',
                'data.last_modified_t'  => '/\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}/|string',
                'data.product_name'     => 'string',
                'data.quantity'         => 'string',
                'data.brands'           => 'string',
                'data.categories'       => 'string',
                'data.labels'           => 'string',
                'data.cities'           => 'string',
                'data.purchase_places'  => 'string',
                'data.stores'           => 'string',
                'data.ingredients_text' => 'string',
                'data.traces'           => 'string',
                'data.serving_size'     => 'string',
                'data.serving_quantity' => 'double',
                'data.nutriscore_score' => 'integer',
                'data.nutriscore_grade' => 'string',
                'data.main_category'    => 'string',
                'data.image_url'        => 'string'
            ]);

            $json->whereAll([
                'data.id'             => $product->id,
                'data.code'             => $product->code,
                'data.status'           => $product->status,
                'data.imported_t'       => $product->imported_t,
                'data.url'              => $product->url,
                'data.creator'          => $product->creator,
                #'data.created_t'       => $product->created_t,
                #'data.last_modified_t' => $product->last_modified_t,
                'data.product_name'     => $product->product_name,
                #'data.quantity'        => $product->quantity,
                'data.brands'           => $product->brands,
                'data.categories'       => $product->categories,
                'data.labels'           => $product->labels,
                'data.cities'           => $product->cities,
                'data.purchase_places'  => $product->purchase_places,
                'data.stores'           => $product->stores,
                'data.ingredients_text' => $product->ingredients_text,
                'data.traces'           => $product->traces,
                'data.serving_size'     => $product->serving_size,
                'data.serving_quantity' => $product->serving_quantity,
                'data.nutriscore_score' => $product->nutriscore_score,
                'data.nutriscore_grade' => $product->nutriscore_grade,
                'data.main_category'    => $product->main_category,
                'data.image_url'        => $product->image_url
            ]);
        });
    }
}
