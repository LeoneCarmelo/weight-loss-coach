<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Measurement;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
/*     public function __construct()
    {
        $this->authorizeResource(Client::class, 'client');
    } */
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::id() === 1) {
            
            $clients = Client::with('measurements')->orderByDesc('id')->paginate(8);
            return view('clients.index', compact('clients'));
        } else {
            return abort('403');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        //dd($request);
        $val_data = $request->validated();
        //Image control
        if ($request->hasFile('photo')) {
            $img_path = Storage::put('client_photo', $request->photo);
            $val_data['photo'] = $img_path;
        }
        $new_client = Client::create($val_data);
        return to_route('clients.index')->with('message', 'Client added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        $measurements = Measurement::where('client_id', $client->id)->orderByDesc('id')->get();
        return view('clients.show', compact('client', 'measurements'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        $val_data = $request->validated();
        //Image control
        if ($request->hasFile('photo')) {
            //Delete old photo
            if ($client->photo) {
                Storage::delete($client->photo);
            }
            // Save the new one and get its path
            $img_path = Storage::put('client_photo', $request->photo);
            $val_data['photo'] = $img_path;
        }
        $client->update($val_data);
        return to_route('clients.index')->with('message', 'Client updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {

        if($client->photo){
            Storage::delete($client->photo);
        }
        $client->delete();
        return to_route('clients.index')->with('message', 'Client deleted!');
    }
}
