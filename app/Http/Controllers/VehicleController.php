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

        if ($request->file("image")) {
            $file = $request->file("image");
            $filename = date("YmdHi") . $file->getClientOriginalName();
            $file->move(public_path("/assets/images"), $filename);
            $data["image"] = $filename;
        }

        $insert = $this->vehicleRepository->store($data);

        if (!$insert) {
            return redirect()->back()->with("error", "Erro ao cadastrar veículo");
        }

        return redirect()->route("home")->with("message", "Veículo cadastrado com sucesso");
    }
}
