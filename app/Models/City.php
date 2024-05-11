<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory;
<<<<<<<< HEAD:app/Models/City.php

     /**
========
    use SoftDeletes;
    /**
>>>>>>>> faac90f57afd7a51a0ccd4b218eec233fe1b533d:app/Models/ServicePriceRange.php
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'city';
    protected $primaryKey = 'city_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'city_name'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'city_id');
    }

    public function service()
    {
        return $this->hasOne(Service::class, 'city_id');
    }
}
