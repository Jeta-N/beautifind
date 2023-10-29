<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employee';

    protected $primaryKey = 'emp_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'account_id',
        'service_id',
        'emp_name',
        'emp_gender',
        'emp_birthdate',
        'emp_phone_number',
        'emp_image_path',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function bookingSlot()
    {
        return $this->hasMany(BookingSlot::class, 'emp_id');
    }

    public function employeeServiceType()
    {
        return $this->hasMany(EmployeeServiceType::class, 'emp_id');
    }
}
