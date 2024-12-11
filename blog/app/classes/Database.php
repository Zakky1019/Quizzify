<?php


namespace App\classes;


class Database
{
    public static function db()
    {
        $link = mysqli_connect('localhost:3306','root','','quizzifynew');
        return $link;
    }
}