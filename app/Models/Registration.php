<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'arrival_date',
        'status',
    ];

    public function patient() {
        return $this->belongsTo(Patient::class);
    }

    public function doctor() {
        return $this->belongsTo(Doctor::class);
    }

    public function inspection() {
        return $this->hasOne(Inspection::class);
    }

    public function getCreatedAtAttribute($value) {
        return date('d M Y', strtotime($value));
    }

    public function getArrivalDateAttribute($value) {
        return date('d M Y', strtotime($value));
    }

    public function getIsHasInspectionAttribute() {
        return $this->inspection ? true : false;
    }
}
