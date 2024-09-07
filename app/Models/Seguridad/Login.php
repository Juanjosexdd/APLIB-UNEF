<?php

namespace App\Models\Seguridad;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Login extends Model
{
    use HasFactory;

    protected $table="login_logs";

    protected $guarded = ['id'];

    protected $dates = ['login_at', 'logout_at'];

        /**
     * Get the user that owns the login log.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
