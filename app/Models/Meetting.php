<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meetting extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function admin()
    {
        return $this->belongsTo('App\Models\ِAdmin');
    }

    public function updatedBy()
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }
}
