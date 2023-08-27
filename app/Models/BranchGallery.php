<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchGallery extends Model
{
    use HasFactory;

    protected $table = 'branch_galleries';

    protected $fillable = [ 'photo','branch_id','admin_id','created_at','updated_at','updated_by'];

    protected $primaryKey = 'id';

    public function branch()
    {
        return $this->belongsTo('App\Models\Branch');
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }
}
