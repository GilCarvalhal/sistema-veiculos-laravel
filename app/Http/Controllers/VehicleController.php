<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        dd("Aqui!", $request);
    }
}
