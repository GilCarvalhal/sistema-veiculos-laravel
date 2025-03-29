<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Repositories\VehicleRepository;
use Illuminate\Http\RedirectResponse;

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

    public function index()
    {
        $perPage = 10;
        $items = $this->vehicleRepository->paginate($perPage);

        return view("home", compact("items"));
    }

    public function edit(int $id)
    {
        $item = $this->vehicleRepository->findById($id);

        return view("form", ["item" => $item]);
    }

    public function update(VehicleRequest $request, int $id): RedirectResponse
    {
        $data = $request->validated();

        if ($request->file("image")) {
            $file = $request->file("image");
            $filename = date("YmdHi") . $file->getClientOriginalName();
            $file->move(public_path("/assets/images"), $filename);
            $data["image"] = $filename;
        }

        $update = $this->vehicleRepository->update($id, $data);

        if (!$update) {
            return redirect()->back()->with("error", "Erro ao atualizar veículo");
        }

        return redirect()->route("home")->with("message", "Veículo atualizado com sucesso");
    }

    public function delete(int $id): RedirectResponse
    {
        $delete = $this->vehicleRepository->delete($id);

        if (!$delete) {
            return redirect()->back()->with("error", "Erro ao excluir veículo");
        }

        return redirect()->route("home")->with("message", "Veículo excluído com sucesso");
    }
}
