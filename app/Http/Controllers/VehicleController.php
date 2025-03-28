<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Repositories\VehicleRepository;

class VehicleController extends Controller
{
    public $vehicleRepository;

    public function __construct(VehicleRepository $vehicleRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
    }

    public function listVehicles()
    {
        return view("index");
    }

    public function create()
    {
        return view("form");
    }

    public function store(VehicleRequest $request)
    {
        $data = $request->validated();

        $insert = $this->vehicleRepository->store($data);
        // dd("Aqui", $insert);

        if (!$insert) {
            return redirect()->back()->with("error", "Erro ao cadastrar veículo");
        }

        return redirect()->route("home")->with("message", "Veículo cadastrado com sucesso");
    }
}
