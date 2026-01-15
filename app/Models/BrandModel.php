<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

/**
 * @use HasFactory<\Database\Factories\BrandModelFactory>
 */
class BrandModel extends Model
{
    /** @use HasFactory<\Database\Factories\BrandModelFactory> */
    use HasFactory;

    protected $table = 'models';

    /**
     * @return BelongsTo<Brand, $this>
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * @param Builder<BrandModel> $query
     */
    public function scopeSearch(Builder $query): void
    {
        $query->join('brands', 'brands.id', 'models.brand_id');
        $query->select('models.*', 'brands.name');
    }
}
