<?php

namespace App\Repositories;

use App\Models\Vehicle;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\QueryBuilder;

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

    /**
     * 
     * @param int $perPage
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        $vehicles = QueryBuilder::for(Vehicle::class)->paginate($perPage);

        return $vehicles;
    }
}
