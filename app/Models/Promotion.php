<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'promotion';

    protected $primaryKey = 'promotion_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'service_id',
        'image_path',
        'promo_title',
        'promo_description',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id')->withTrashed();
    }
}
