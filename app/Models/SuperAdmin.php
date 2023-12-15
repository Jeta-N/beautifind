<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuperAdmin extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'super_admin';
    protected $primaryKey = 'sa_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'account_id',
        'service_id',
        'sa_name',
        'sa_image_path',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
