<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['client_id','doctor_id','office_id', 'status_id', 'date'];

    protected $casts = ['date'  => 'datetime'];

    /**
     * Get the client record associated with the appointment.
     */
    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    /**
     * Get the doctor record associated with the appointment.
     */
    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }

    /**
     * Get the office record associated with the appointment.
     */
    public function office()
    {
        return $this->belongsTo('App\Office');
    }

    /**
     * Get the status record associated with the appointment.
     */
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
}
