<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([], function() {
    Route::resource('/status', StatusController::class)->except(['edit','create']);
    Route::resource('/specialization', SpecializationController::class)->except(['edit','create']);
    Route::resource('/client', ClientController::class)->except(['edit','create']);
    Route::resource('/office', OfficeController::class)->except(['edit','create']);
    Route::resource('/appointment', AppointmentController::class)->except(['edit','create']);
    Route::resource('/doctor', DoctorController::class)->except(['edit','create']);
    Route::post('/doctor/{doctor}/office/{office}', 'DoctorController@addOffice')->name('doctor.office.add');
    Route::post('/doctor/{doctor}/specialization/{specialization}', 'DoctorController@addSpecialization')->name('doctor.specialization.add');
    Route::delete('/doctor/{doctor}/office/{office}', 'DoctorController@removeOffice')->name('doctor.office.remove');
    Route::delete('/doctor/{doctor}/specialization/{specialization}', 'DoctorController@removeSpecialization')->name('doctor.specialization.remove');
});
