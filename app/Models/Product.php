<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    use HasFactory;
    
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function scopeHome($query)
    {
        return $query->where('home',1);
    }

}
