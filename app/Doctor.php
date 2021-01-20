<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ['firstname','lastname','crm', 'gender'];

    protected $appends = ['fullname'];

    public function getFullNameAttribute()
    {
        return trim("{$this->firstname} {$this->lastname}");
    }
}
