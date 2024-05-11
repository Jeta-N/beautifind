<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'booking';
    protected $primaryKey = 'booking_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'service_id',
        'bs_id',
        'st_id',
        'price',
        'booking_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id')->withTrashed();
    }

    public function bookingSlot()
    {
        return $this->belongsTo(BookingSlot::class, 'bs_id');
    }

    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class, 'st_id');
    }

    public function review()
    {
        return $this->hasOne(Review::class, 'booking_id');
    }
}
