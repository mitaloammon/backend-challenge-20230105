<?php

namespace App\Http\Controllers;


use App\Services\ProductParserService;

use App\Http\Requests\StoreProductParserPost;
use App\Http\Resources\ProductParserResource;

class ProductParserController extends Controller
{
    protected $productService;

    public function __construct(ProductParserService $productParser)
    {
        $this->productService = $productParser;
    }

    /**
     * Display a lysting of the resource
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = $this->productService->get();

        return ProductParserResource::collection($product);
    }



    /**
     * Display the specified resource
     *
     * @param int $code
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        $product = $this->productService->getProduct($code);

        return new ProductParserResource($product);
    }

    /**
     * Update the specified resource in storage
     *
     * @param \Illuminate\Http\Request $request
     * @param int $code
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductParserPost $request, $code)
    {
        $this->productService->updateProduct($request->validated(), $code);

        return response()->json([
            'updated' => true
        ]);
    }

    /**
     * Remove the specified resource from storage
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($code)
    {
        $this->productService->deleteProduct($code);

        return response()->json([], 204);
    }
}
