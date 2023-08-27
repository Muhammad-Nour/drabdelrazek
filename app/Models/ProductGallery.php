<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    use HasFactory;

    protected $table = 'product_galleries';

    protected $fillable = [ 'photo','product_id','admin_id' ];

    protected $primaryKey = 'id';

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }
}
