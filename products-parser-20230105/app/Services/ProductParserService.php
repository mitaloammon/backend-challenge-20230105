<?php

namespace App\Services;

use App\Repositories\ProductParserRepository;


class ProductParserService
{
    protected $repository;

    public function __construct(ProductParserRepository $productRepository)
    {
        $this->repository = $productRepository;
    }

    public function get()
    {
        try {
            return $this->repository->getAll();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to load Products'], 500);
        }
    }

    public function createNewProduct(array $data)
    {
        return $this->repository->createNewProduct($data);
    }

    public function getProduct(string $identify)
    {
        try {
            return $this->repository->getProduct($identify);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to view Product'], 404);
        }
    }

    public function updateProduct(string $identify, array $data)
    {
        return $this->repository->updateProduct($identify, $data);
    }

    public function deleteProduct(string $identify)
    {
        try {
            return $this->repository->deleteProduct($identify);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Product not found'], 404);
        }
    }
}
