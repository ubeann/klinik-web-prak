<?php

namespace App\Models;

class About 
{
    private static $blog_about = [
        [
           "nama" => "Drg. Prita, Sp.Ort",
           "address" => "Jl. Palm Raya (Ruko Komp. Griya Mawar Asri), Guntungmanggis, Landasan Ulin, Kota Banjarbaru, Kalimantan Selatan",
           "notelp" => "085348728757"
        ],
        [
            "nama" => "Drg. Toto, Sp.KG",
           "address" => "Jl. Palm Raya (Ruko Komp. Griya Mawar Asri), Guntungmanggis, Landasan Ulin, Kota Banjarbaru, Kalimantan Selatan",
           "notelp" => "085348728757"
         ],
   ];
   
   public static function all()
   {
       return self::$blog_about;
   }
}
