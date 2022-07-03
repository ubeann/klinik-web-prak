<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'specialization',
        'birth_date',
        'number_SIP',
        'number_phone',
        'address',
        'image',
    ];

    public function registrations() {
        return $this->hasMany(Registration::class);
    }

    public function getNameCardAttribute() {
        return Str::limit($this->name, 15, '...');

    }

    public function getAddressCardAttribute() {
        return Str::limit($this->address, 15, '...');
    }

    public function getBirthDateAttribute($value) {
        return date('d M Y', strtotime($value));
    }

    public function getSpecializationAttribute($value) {
        return ucfirst($value);
    }
}
