<?php

namespace App\Http\Controllers;

use App\Services\ProductParserAPIService;
use App\Http\Resources\ProductParserAPIResource;


class ProductParserAPIController extends Controller
{
    private $apiProduct;

    public function __construct(ProductParserAPIService $apiProductParser)
    {
        $this->apiProduct = $apiProductParser;
    }

    public function index()
    {

        $api = $this->apiProduct->get();

        return ProductParserAPIResource::collection($api);
    }
}
