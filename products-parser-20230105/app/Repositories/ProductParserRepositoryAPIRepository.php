<?php

namespace App\Repositories;

use App\Models\ProductParserAPI;


class ProductParserRepositoryAPIRepository
{
    /**
     * The model reference
     */
    protected $entity;


    /**
     * Constructor
     */
    public function __construct(ProductParserAPI $model)
    {
        $this->entity = $model;
    }


    /**
     * Get all from Model
     * @return all of the models from the database.
     */
    public function get()
    {
        return $this->entity->all();
    }
}
