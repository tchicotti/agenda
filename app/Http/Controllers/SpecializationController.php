<?php

namespace App\Http\Controllers;

use App\Specialization;
use Illuminate\Http\Request;
use App\Http\Requests\SpecializationRequest;
use App\Http\Resources\SpecializationResource;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SpecializationResource::collection(Specialization::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Request\SpecializationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpecializationRequest $request)
    {
        $data = Specialization::create($request->all());

        return response()->json([
            'status' => true,
            'data' => $data
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Specialization  $specialization
     * @return \Illuminate\Http\Response
     */
    public function show(Specialization $specialization)
    {
        return response()->json([
            'status' => true,
            'data' => new SpecializationResource($specialization)
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Specialization  $specialization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specialization $specialization)
    {
        $specialization->name = $request->name;
        $specialization->save();

        return response()->json([
            'status' => true,
            'data' => $specialization
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Specialization  $specialization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialization $specialization)
    {
        $specialization->delete();

        return response()->json([
            'status' => true,
            'message' => 'The record was deleted.',
        ], 200);
    }
}
