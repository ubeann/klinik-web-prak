<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'inspection_id',
        'name',
    ];

    public function inspection() {
        return $this->belongsTo(Inspection::class);
    }
}
