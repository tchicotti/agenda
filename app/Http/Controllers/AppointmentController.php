<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Http\Requests\AppointmentRequest;
use App\Http\Resources\AppointmentResource;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AppointmentResource::collection(Appointment::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\AppointmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppointmentRequest $request)
    {
        //dd($request);
        $data = Appointment::create($request->all());

        return response()->json([
            'status' => true,
            'data' => $data
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        return response()->json([
            'status' => true,
            'data' => new AppointmentResource($appointment)
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\AppointmentRequest  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(AppointmentRequest $request, Appointment $appointment)
    {
        $appointment->client_id = $request->client_id;
        $appointment->doctor_id = $request->doctor_id;
        $appointment->office_id = $request->office_id;
        $appointment->status_id = $request->status_id;
        $appointment->date      = $request->date;
        $appointment->save();

        return response()->json([
            'status' => true,
            'data' => $appointment
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return response()->json([
            'status' => true,
            'message' => 'The record was deleted.',
        ], 200);
    }
}
