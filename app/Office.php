<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = ['name', 'street_address', 'city', 'state', 'country'];

    /**
     * Get all related doctors
     *
     * @return array
     */
    public function doctors() {
        return $this->belongsToMany('App\Doctor');
    }
}
