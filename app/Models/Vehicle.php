<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Vehicle extends Model
{
    protected $fillable = [
        'model_id',
        'model_year',
        'year',
        'color_id',
        'plate',
    ];
    public function scopeSearch($query, Request $request)
    {

        if ($request->model) {
            $query->whereHas('model', function ($q) use ($request) {
                $q->where('name', 'ilike', '%' . $request->model . '%');
            });
        }
        if ($request->plate) {
            $query->where('plate', $request->plate);
        }

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
