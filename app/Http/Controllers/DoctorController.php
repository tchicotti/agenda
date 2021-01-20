<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Http\Requests\DoctorRequest;
use App\Http\Resources\DoctorResource;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DoctorResource::collection(Doctor::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\DoctorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorRequest $request)
    {
        $data = Doctor::create($request->all());

        return response()->json([
            'status' => true,
            'data' => $data
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        return response()->json([
            'status' => true,
            'data' => new DoctorResource($doctor)
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\DoctorRequest  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(DoctorRequest $request, Doctor $doctor)
    {
        $doctor->firstname = $request->firstname;
        $doctor->lastname = $request->lastname;
        $doctor->crm = $request->crm;
        $doctor->save();

        return response()->json([
            'status' => true,
            'data' => $doctor
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return response()->json([
            'status' => true,
            'message' => 'The record was deleted.',
        ], 200);
    }
}
