<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * 📝 Fillable fields
     * Mass assignment के लिए allowed fields
     */
    protected $fillable = [
        'full_name',
        'father_name',
        'email',
        'mobile_no',
        'password',
        'show_password',
        'address',
        'district',
        'pin_code',
        'profile_photo',
    ];



    /**
     * 🔒 Hidden fields
     * जब model को JSON में convert किया जाता है, तो ये fields hide रहती हैं
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * 📅 Casts
     * Specific columns को type-casting के लिए use किया जाता है
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 🔗 Relationship: One User → Many Submissions
     * एक user के कई submissions हो सकते हैं
     */
    public function submissions()
    {
        return $this->hasMany(\App\Models\Submission::class);
    }

    /**
     * 🔗 Relationship: One User → Many Activities
     * हर user के activities log होंगे
     */
    public function activities()
    {
        return $this->hasMany(\App\Models\Activity::class);
    }

    /**
     * 🔗 Relationship: One User → Many Notifications
     * हर user को कई notifications मिल सकती हैं
     */
    public function notifications()
    {
        return $this->hasMany(\App\Models\Notification::class);
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {

            // Only fetch last user where user_id IS NOT NULL
            $lastUserWithId = User::whereNotNull('user_id')
                ->orderBy('id', 'DESC')
                ->first();

            // If record exists → generate next number
            if ($lastUserWithId) {
                $number = intval(substr($lastUserWithId->user_id, 1)) + 1;
            } else {
                $number = 1; // First user
            }

            // Format: U0001
            $user->user_id = 'U' . str_pad($number, 4, '0', STR_PAD_LEFT);
        });
    }


}
