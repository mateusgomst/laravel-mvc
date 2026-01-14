<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Test\Target\Function_;

class Vehicle extends Model
{
    //
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
