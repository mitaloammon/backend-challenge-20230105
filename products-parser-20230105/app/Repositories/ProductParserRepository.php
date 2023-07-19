<?php

namespace App\Repositories;

use App\Models\ProductParser;


class ProductParserRepository
{
    protected $entity;

    public function __construct(ProductParser $model)
    {
        $this->entity = $model::with('productParserAPI')->get();
    }

    public function getAll()
    {
        return $this->entity->all();
    }

    public function createNewProduct(array $data)
    {
        return $this->entity->create($data);
    }

    public function getProduct(string $identify)
    {
        return $this->entity->findOrfail($identify);
    }

    public function updateProduct(string $identify, array $data)
    {
        $model = $this->getProduct($identify);

        return $model->update($data);
    }

    public function deleteProduct(string $identify)
    {
        $model = $this->getProduct($identify);

        return $model->delete();
    }
}
