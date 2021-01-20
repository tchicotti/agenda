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

    /**
     * Add to the specified resource in storage the new office.
     *
     * @param  Illuminate\Http\Request $request
     * @param  \App\Doctor  $doctor
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function addOffice(Request $request, Doctor $doctor, \App\Office $office)
    {

        if (!$doctor->offices->contains($office->id)) {
            $doctor->offices()->attach($office);
            $doctor->save();

            $data = Doctor::findOrFail($doctor->id);

            return response()->json([
                'status' => true,
                'data' => new DoctorResource($data)
            ], 200);
        }

        return response()->json([
            'status' => true,
            'data' => $doctor,
            'message' => 'Office was already included.'
        ], 200);
    }

    /**
     * Remove to the specified resource in storage the selected office.
     *
     * @param  Illuminate\Http\Request $request
     * @param  \App\Doctor  $doctor
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function removeOffice(Request $request, Doctor $doctor, \App\Office $office)
    {
        if ($doctor->offices->contains($office->id)) {
            $doctor->offices()->detach($office);
            $doctor->save();

            $data = Doctor::findOrFail($doctor->id);

            return response()->json([
                'status' => true,
                'data' => new DoctorResource($data)
            ], 200);
        }

        return response()->json([
            'status' => true,
            'data' => $doctor,
            'message' => 'Office was not included.'
        ], 200);
    }

    /**
     * Add to the specified resource in storage the new specialization.
     *
     * @param  Illuminate\Http\Request $request
     * @param  \App\Doctor  $doctor
     * @param  \App\Specialization  $specialization
     * @return \Illuminate\Http\Response
     */
    public function addSpecialization(Request $request, Doctor $doctor, \App\Specialization $specialization)
    {

        if (!$doctor->specializations->contains($specialization->id)) {
            $doctor->specializations()->attach($specialization);
            $doctor->save();

            $data = Doctor::findOrFail($doctor->id);

            return response()->json([
                'status' => true,
                'data' => new DoctorResource($data)
            ], 200);
        }

        return response()->json([
            'status' => true,
            'data' => $doctor,
            'message' => 'Specialization was already included.'
        ], 200);
    }

    /**
     * Remove to the specified resource in storage the selected specialization.
     *
     * @param  Illuminate\Http\Request $request
     * @param  \App\Doctor  $doctor
     * @param  \App\Specialization  $specialization
     * @return \Illuminate\Http\Response
     */
    public function removeSpecialization(Request $request, Doctor $doctor, \App\Specialization $specialization)
    {

        if ($doctor->specializations->contains($specialization->id)) {
            $doctor->specializations()->detach($specialization);
            $doctor->save();

            $data = Doctor::findOrFail($doctor->id);

            return response()->json([
                'status' => true,
                'data' => new DoctorResource($data)
            ], 200);
        }

        return response()->json([
            'status' => true,
            'data' => $doctor,
            'message' => 'Specialization was not included.'
        ], 200);
    }
}
