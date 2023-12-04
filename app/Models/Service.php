<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'service';

    protected $primaryKey = 'service_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'service_name',
        'service_description',
        'service_opening_hours',
        'service_address',
        'city_id',
        'service_phone',
        'service_email',
        'service_instagram',
        'service_image_path',
        'service_status',
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function promotion()
    {
        return $this->hasMany(Promotion::class, 'service_id');
    }

    public function faq()
    {
        return $this->hasMany(Faq::class, 'service_id');
    }

    public function portfolioImage()
    {
        return $this->hasMany(PortfolioImage::class, 'service_id');
    }

    public function booking()
    {
        return $this->hasMany(Booking::class, 'service_id');
    }

    public function bookingSlot()
    {
        return $this->hasMany(BookingSlot::class, 'service_id');
    }

    public function employee()
    {
        return $this->hasMany(Employee::class, 'service_id');
    }

    public function serviceServiceType()
    {
        return $this->hasMany(ServiceServiceType::class, 'service_id');
    }

    public function superAdmin()
    {
        return $this->hasOne(SuperAdmin::class, 'service_id');
    }

    public function servicePriceRange()
    {
        return $this->hasMany(ServicePriceRange::class, 'service_id');
    }
}
