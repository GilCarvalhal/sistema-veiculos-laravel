<?php

namespace App\Repositories;

use App\Models\Vehicle;

class VehicleRepository
{
    /**
     * 
     * @var
     */
    private $model;

    /**
     *
     * @param \App\Models\Vehicle $model
     */
    public function __construct(Vehicle $model)
    {
        $this->model = $model;
    }

    /**
     * Cria um recurso
     * @param array $data
     * @return Vehicle
     */
    public function store(array $data): Vehicle
    {
        return $this->model->create($data);
    }
}
