<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_id',
        'type',
        'price',
    ];

    public function registration() {
        return $this->belongsTo(Registration::class);
    }

    public function service() {
        return $this->hasOne(Service::class);
    }

    public function getTypeAttribute($value) {
        return ucfirst($value);
    }

    public function getPriceFormattedAttribute() {
        return 'Rp ' . number_format($this->price, 2, ',', '.');
    }
}
