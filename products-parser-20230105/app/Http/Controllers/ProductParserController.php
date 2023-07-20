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
     * Store a nely created resource in storage
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductParserPost $request)
    {
        $product = $this->productService->createNewProduct($request->validated());

        return new ProductParserResource($product);
    }

    /**
     * Display the specified resource
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->productService->getProduct($id);

        return new ProductParserResource($product);
    }

    /**
     * Update the specified resource in storage
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductParserPost $request, $id)
    {
        $this->productService->updateProduct($id, $request->validated());

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
    public function destroy($id)
    {
        $this->productService->deleteProduct($id);

        return response()->json([], 204);
    }
}
