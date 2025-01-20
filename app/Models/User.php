<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'username',
        'email',
        'password',
        'contact_no',
        'is_otp_verified',
    ];
    public function hasRole(string $role): bool
    {
        return $this->role === $role; // Assuming you have a `role` column in your `users` table
    }

}
