<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceRange extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'price_range';
    protected $primaryKey = 'pr_id';

    public function servicePriceRange()
    {
        return $this->hasMany(ServicePriceRange::class, 'pr_id');
    }
}
