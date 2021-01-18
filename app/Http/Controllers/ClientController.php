<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ClientRequest;
use App\Http\Resources\ClientResource;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ClientResource::collection(Client::paginate());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Request\ClientRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $data = Client::create($request->all());

        return response()->json([
            'status' => true,
            'data' => $data
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return response()->json([
            'status' => true,
            'data' => new ClientResource($client)
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Request\ClientRequest $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, Client $client)
    {
        $client->firstname = $request->firstname;
        $client->lastname = $request->lastname;
        $client->email = $request->email;
        $client->personal_phone = $request->personal_phone;
        $client->contact_phone = $request->contact_phone;
        $client->birthdate = $request->birthdate;
        $client->save();

        return response()->json([
            'status' => true,
            'data' => $client
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return response()->json([
            'status' => true,
            'message' => 'The record was deleted.',
        ], 200);
    }
}
