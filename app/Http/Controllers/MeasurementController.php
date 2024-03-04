<?php

namespace App\Http\Controllers;

use App\Models\Measurement;
use App\Models\Client;
use App\Http\Requests\StoreMeasurementRequest;
use App\Http\Requests\UpdateMeasurementRequest;

class MeasurementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('measurements.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMeasurementRequest $request)
    {
        $val_data = $request->validated();
        $clientId = $val_data['client_id'];
        //dd($clientId);
        $new_measurement = Measurement::create($val_data);
        return to_route('clients.show', ['client' => $clientId])->with('message', 'Measurement added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Measurement $measurement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Measurement $measurement)
    {
        return view('measurements.edit', compact('measurement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMeasurementRequest $request, Measurement $measurement)
    {
        $val_data = $request->validated();
        $clientId = $val_data["client_id"];
        $client = Client::find($clientId); 
        $measurement->update($val_data);
        $measurements = Measurement::where('client_id', $clientId)->orderByDesc('id')->get();

        return to_route('clients.show', compact('clientId', 'client', 'measurements'))->with('message', 'Measurement updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Measurement $measurement)
    {
        //dd($measurement);
        $clientId = $measurement["client_id"];
        $client = Client::find($clientId); 
        $measurement->delete();
        $measurements = Measurement::where('client_id', $clientId)->orderByDesc('id')->get();

        return to_route('clients.show', compact('clientId', 'client', 'measurements'))->with('message', 'Measurement deleted!');
    }
}
