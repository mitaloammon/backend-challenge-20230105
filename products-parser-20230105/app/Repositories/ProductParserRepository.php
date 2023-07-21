<?php

namespace App\Repositories;

use App\Models\ProductParser;


class ProductParserRepository
{
    protected $entity;

    public function __construct(ProductParser $model)
    {
        $this->entity = $model;
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

    public function updateProduct(string $id, array $data)
    {
        $model = $this->getProduct($id);

        return $model->update($data);
    }

    public function deleteProduct(string $identify)
    {
        $model = $this->getProduct($identify);

        return $model->delete();
    }
}
