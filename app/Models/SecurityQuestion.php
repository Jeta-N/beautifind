<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SecurityQuestion extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'security_question';

    protected $primaryKey = 'sq_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sq_question',
    ];

    public function userSecurityQuestion()
    {
        return $this->hasMany(UserSecurityQuestion::class, 'sq_id');
    }
}
