<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable // Mewarisi class Authenticatable (Inheritance)
{
    use Notifiable;

    protected $fillable = ['nama', 'email', 'password', 'role_id'];
    protected $hidden = ['password']; // Encapsulation: menyembunyikan password

    // Relasi: User memiliki 1 Role (BelongsTo)
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}