<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'employee_number',
        'last_name',
        'first_name',
        'department',
        'photo',
        'phone_number',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function getRoleNameAttribute()
    {
        return match($this->is_role) {
            0 => 'senior',
            1 => 'analyst',
            2 => 'manager',
            3 => 'admin',
            default => 'unknown',
        };
    }
    public function getPhotoUrlAttribute()
    {
        return $this->photo && file_exists(public_path($this->photo))
            ? asset($this->photo)
            : asset('img/default-user.png');
    }
}
