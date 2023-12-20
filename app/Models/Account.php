<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Account extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'account';
    protected $primaryKey = 'account_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'account_role',
        'is_blocked'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'account_id');
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'account_id');
    }

    public function superAdmin()
    {
        return $this->hasOne(SuperAdmin::class, 'account_id');
    }
}
