<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Models\BrandModel;
use App\Models\Color;
use App\Models\Optional;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Vehicle::search($request);

        $n = $request->get('list', 10);

        $list = $query->paginate($n);

        $data = [
            'list' => $list
        ];

        return view('pages.vehicle.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehicle = new Vehicle();
        return $this->form($vehicle);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVehicleRequest $request)
    {

        $data = $request->validated();

        $vehicle = Vehicle::create($data);

        return redirect()->route('vehicles.index')->with('success', 'Vehicle criado com sucesso!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $data = [
            'vehicle' => $vehicle
        ];
        return view('pages.vehicle.show-vehicle', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vehicle = Vehicle::findOrFail($id);

        return $this->form($vehicle);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        $data = $request->validated();

        $vehicle->fill($data);

        $vehicle->save();

        return redirect()->route('vehicles.index')->with('success', 'Veiculo atualizado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehicle = Vehicle::findOrFail($id);

        Vehicle::destroy($id);

        return redirect()->route('vehicles.index')->with('success', 'Veiculo deletado com sucesso!');
    }

    /**
     * Form Vehicle
     * @param Vehicle $vehicle
     * @return \Illuminate\Contracts\View\View
     */
    private function form(Vehicle $vehicle)
    {
        $models = BrandModel::search()->baseSole()->get();
        $colors = Color::All();
        $optionals = Optional::All();


        $data = [
            'vehicle' => $vehicle,
            'models' => $models,
            'colors' => $colors,
            'optionals' => $optionals
        ];

        return view('pages.vehicle.form', $data);
    }
}
