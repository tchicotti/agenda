<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['firstname', 'lastname', 'email', 'personal_phone', 'contact_phone', 'birthdate', 'gender'];

    protected $casts = ['birthdate'  => 'date'];

    protected $appends = ['fullname'];

    public function getFullNameAttribute()
    {
        return trim("{$this->firstname} {$this->lastname}");
    }
}
