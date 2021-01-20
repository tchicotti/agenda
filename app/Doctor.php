<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ['firstname','lastname','crm', 'gender'];

    protected $appends = ['fullname'];

    /**
     * Get the firstname and lastname together as one.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return trim("{$this->firstname} {$this->lastname}");
    }

    /**
     * Get all related offices
     *
     * @return array
     */
    public function offices() {
        return $this->belongsToMany('App\Office');
    }

    /**
     * Get all related specializations
     *
     * @return array
     */
    public function specializations() {
        return $this->belongsToMany('App\Specialization');
    }
}
