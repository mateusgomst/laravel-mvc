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

    /**
     * @param \Illuminate\Database\Eloquent\Builder<Vehicle> $query
     */
    public function scopeSearch(\Illuminate\Database\Eloquent\Builder $query, Request $request): void
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<BrandModel, $this>
     */
    public function model(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BrandModel::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Color, $this>
     */
    public function color(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Optional, $this>
     */
    public function optionals(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Optional::class, 'vehicle_optional');
    }
}
