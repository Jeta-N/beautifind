<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserSecurityQuestion extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_security_question';

    protected $primaryKey = 'usq_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'sq_id',
        'sq_answer',
    ];

    public function securityQuestion()
    {
        return $this->belongsTo(SecurityQuestion::class, 'sq_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }
}
