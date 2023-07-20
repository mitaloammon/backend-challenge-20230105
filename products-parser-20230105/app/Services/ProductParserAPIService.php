<?php

namespace App\Services;

use App\Repositories\ProductParserRepositoryAPIRepository;

class ProductParserAPIService
{
    protected $repository;

    public function __construct(ProductParserRepositoryAPIRepository $productRepository)
    {
        $this->repository = $productRepository;
    }

    /**
     * The method index of repository
     */
    public function get()
    {
        return $this->repository->get();
    }
}
