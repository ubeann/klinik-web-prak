<?php

namespace App\Models;

class Pasien 
{
    private static $data_pasien = [
        [
           "ID" => "Behel Gigi",
           "Nama Pasien" => "behel-gigi",
           "Tanggal Lahir" => "Drg. Prita, Sp.Ort",
           "Alamat" => "Kawat gigi atau biasa disebut sebagai behel adalah alat berbasis kawat yang digunakan oleh 
           ortodontis untuk memperbaiki gigi atau rahang yang tidak rata dan gigi yang bertumpuk.",
           "No Telepon" => "08123456"
        ],
        [
            "ID" => "Behel Gigi",
            "Nama Pasien" => "behel-gigi",
            "Tanggal Lahir" => "Drg. Prita, Sp.Ort",
            "Alamat" => "Kawat gigi atau biasa disebut sebagai behel adalah alat berbasis kawat yang digunakan oleh 
            ortodontis untuk memperbaiki gigi atau rahang yang tidak rata dan gigi yang bertumpuk.",
            "No Telepon" => "08123456"
        ],
   ];
   
       public static function all()
       {
           return self::$data_pasien;
       }
}
