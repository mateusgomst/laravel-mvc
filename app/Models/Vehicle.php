<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Test\Target\Function_;
use Symfony\Component\HttpFoundation\Request;

class Vehicle extends Model
{
    //
    public function scopeSearch($query, Request $request)
    {
        // if ($request->name) {
        //     $query->where('name', 'ilike', '%' . $request->name . '%');
        // }
        // if ($request->email) {
        //     $query->where('email', 'ilike', '%' . $request->email . '%');
        // }
    }

    public function model()
    {
        return $this->belongsTo(BrandModel::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function optionals()
    {
        return $this->belongsToMany(Optional::class, 'vehicle_optional');
    }
}
