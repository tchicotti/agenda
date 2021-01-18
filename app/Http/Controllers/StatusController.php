<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StatusRequest;
use App\Status;
use App\Http\Resources\StatusResource;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return StatusResource::collection(Status::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Request\StatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatusRequest $request)
    {
        $data = Status::create($request->all());

        return response()->json([
            'status' => true,
            'data' => $data
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Status $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        return response()->json([
            'status' => true,
            'data' => new StatusResource($status)
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Request\StatusRequest   $request
     * @param  App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(StatusRequest $request, Status $status)
    {
        $status->name = $request->name;
        $status->save();

        return response()->json([
            'status' => true,
            'data' => $status
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        $status->delete();

        return response()->json([
            'status' => true,
            'message' => 'The record was deleted.',
        ], 200);
    }
}
