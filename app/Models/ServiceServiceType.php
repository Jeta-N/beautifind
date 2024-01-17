<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceServiceType extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'service_service_type';
    protected $primaryKey = 'sst_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'service_id',
        'st_id',
        'duration',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id')->withTrashed();
    }

    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class, 'st_id');
    }
}
