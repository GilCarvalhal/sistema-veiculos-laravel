<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;

class VehicleController extends Controller
{
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
        dd("Aqui!", $data);
    }
}
