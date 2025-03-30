<?php

namespace App\Repositories;

use App\Models\Vehicle;
use App\Utils\Filters\LowerThanFilter;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
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
                'type',
                AllowedFilter::custom('vehicle_year', new LowerThanFilter),
                AllowedFilter::custom('kilometers', new LowerThanFilter),
                AllowedFilter::custom('price', new LowerThanFilter),
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

    public function delete(int $id)
    {
        $vehicle = $this->findById($id);

        if (!$vehicle) {
            return false;
        };

        return $vehicle->delete($id);
    }
}
