<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioImage extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'portfolio_image';
    protected $primaryKey = 'pi_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'service_id',
        'image_path',
        'portfolio_title',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
