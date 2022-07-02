<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $table = 'dokters';
    protected $fillable = [
        'dokter_name',
        'tgl_lahir',
        'no_SIP',
        'sps',
        'alamat',
        'no_telp'
    ];
}
