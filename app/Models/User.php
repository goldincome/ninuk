<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Password;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\AdminSetupPasswordNotification;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const USER_TYPE_ADMIN = 1;
    const USER_TYPE_SUPER_ADMIN = 2;
    const USER_STATUS_ACTIVE = 1;
    const USER_STATUS_DISABLED = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'user_type',
        'status',
        'created_by',
        'token',
        'location_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

       public function sendPasswordSetupNotification()
    {
        $this->notify(new AdminSetupPasswordNotification($this->token));
    }

    public function isSuperAdmin(){
        return $this->user_type == $this::USER_TYPE_SUPER_ADMIN;
    }

    public function location()
    {
        return $this->belongsTo(Location::class,)
            ->withDefault([
                    'location_name' => 'All Locations',
            ]);
    }

}
