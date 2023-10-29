<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'service_type';
    protected $primaryKey = 'st_id';

    public function serviceServiceType()
    {
        return $this->hasMany(ServiceServiceType::class, 'st_id');
    }

    public function employeeServiceType()
    {
        return $this->hasMany(EmployeeServiceType::class, 'st_id');
    }
}
