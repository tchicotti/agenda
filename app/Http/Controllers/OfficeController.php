<?php

namespace App\Http\Controllers;

use App\Office;
use App\Http\Requests\OfficeRequest;
use App\Http\Resources\OfficeResource;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OfficeResource::collection(Office::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\OfficeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfficeRequest $request)
    {
        $data = Office::create($request->all());

        return response()->json([
            'status' => true,
            'data' => $data
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function show(Office $office)
    {
        return response()->json([
            'status' => true,
            'data'   => new OfficeResource($office)
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\OfficeRequest  $request
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function update(OfficeRequest $request, Office $office)
    {
        $office->name           = $request->name;
        $office->street_address = $request->street_address;
        $office->city           = $request->city;
        $office->state          = $request->state;
        $office->country        = $request->country;
        $office->save();

        return response()->json([
            'status' => true,
            'data' => $office
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $office)
    {
        $office->delete();

        return response()->json([
            'status' => true,
            'message' => 'The record was deleted.',
        ], 200);
    }
}
