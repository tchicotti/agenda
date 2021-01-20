<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    protected $fillable = ['name'];

    /**
     * Get all related doctors
     *
     * @return array
     */
    public function doctors() {
        return $this->belongsToMany('App\Doctor');
    }
}
