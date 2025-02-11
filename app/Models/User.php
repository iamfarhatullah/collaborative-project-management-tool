<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'role', 'password'];

    protected $hidden = ['password', 'remember_token'];

    // Check if the user is an Admin
    public function isAdmin() {
        return $this->role === 'admin';
    }

    // Check if the user is a Manager
    public function isManager() {
        return $this->role === 'manager';
    }

    // Check if the user is a normal User
    public function isUser() {
        return $this->role === 'user';
    }

    // Check if user is Inactive
    public function isInactive() {
        return $this->role === 'inactive';
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
