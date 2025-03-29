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
        $vehicles = QueryBuilder::for(Vehicle::class)
            ->allowedFilters([
                'name',
                'brand',
                'city',
            ])
            ->paginate($perPage);

        return $vehicles;
    }

    public function findById(int $id)
    {

        $vehicle = QueryBuilder::for(Vehicle::class)
            ->where("id", $id)
            ->first();

        return $vehicle;
    }

    public function update(int $id, array $data)
    {
        $vehicle = $this->findById($id);

        if (!$vehicle) {
            return false;
        };

        return $vehicle->update($data);
    }
}
