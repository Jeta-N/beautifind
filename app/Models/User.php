<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user';
    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'account_id',
        'user_name',
        'user_gender',
        'user_birthdate',
        'user_phone_number',
        'city_id',
        'user_image_path',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function userSecurityQuestion()
    {
        return $this->hasOne(userSecurityQuestion::class, 'user_id');
    }

    public function review()
    {
        return $this->hasMany(Review::class, 'user_id');
    }

    public function booking()
    {
        return $this->hasMany(Booking::class, 'user_id');
    }

    public function userServiceType()
    {
        return $this->hasMany(UserServiceType::class, 'user_id');
    }
}
