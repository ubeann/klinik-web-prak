<?php

namespace App\Models;

class Post 
{
    private static $blog_post = [
     [
        "title" => "Behel Gigi",
        "slug" => "behel-gigi",
        "author" => "Drg. Prita, Sp.Ort",
        "body" => "Kawat gigi atau biasa disebut sebagai behel adalah alat berbasis kawat yang digunakan oleh 
        ortodontis untuk memperbaiki gigi atau rahang yang tidak rata dan gigi yang bertumpuk."
     ],
     [
        "title" => "Veneer Gigi",
        "slug" => "veneer-gigi",
        "author" => "Drg. Toto, Sp.KG",
        "body" => "Veneer gigi adalah prosedur medis yang bertujuan untuk memperbaiki penampilan gigi seseorang dengan cara menempelkan veneer di bagian depan gigi. Veneer dapat menutupi kecacatan pada gigi, seperti bentuk, warna, dan ukuran gigi yang tidak sesuai dengan keinginan pasien.   "
     ],
];

    public static function all()
    {
        return self::$blog_post;
    }
}
