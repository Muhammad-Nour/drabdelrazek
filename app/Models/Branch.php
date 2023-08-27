<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'branches';

    protected $fillable = 

    ['id','name_en','name_ar','date','address_ar','address_en','photo','map','admin_id','updated_by','updated_at','created_at'];

    
    protected $primaryKey = 'id';

    public function admin()
    {
        return $this->belongsTo('App\Models\ِAdmin');
    }

    public function gallery()
    {
        return $this->hasMany('App\Models\BranchGallery');
    }
}
