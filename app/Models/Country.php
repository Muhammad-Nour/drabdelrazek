<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function state()
    {
        return $this->hasMany(State::class);
    }

    public function appointment()
    {
        return $this->hasMany(Appointment::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
