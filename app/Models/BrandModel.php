<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    use HasFactory;

    protected $table = 'models';
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function scopeSearch($query)
    {
        $query->join('brands', 'brands.id', 'models.brand_id');
        $query->select('models.*', 'brands.name');
    }

}
