<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Patient extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'birth_date',
        'number_phone',
        'address',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function registrations() {
        return $this->hasMany(Registration::class);
    }

    public function getAddressCardAttribute() {
        return Str::limit($this->address, 15, '...');
    }

    public function getBirthDateAttribute($value) {
        return date('d M Y', strtotime($value));
    }
}
