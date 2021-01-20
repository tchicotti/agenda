<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'client_id' => $this->client_id,
            'client' => $this->client,
            'doctor_id' => $this->doctor_id,
            'doctor' => $this->doctor,
            'office_id' => $this->office_id,
            'office' => $this->office,
            'status_id' => $this->status_id,
            'status' => $this->status,
            'date'=> $this->date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at

        ];
    }
}
