<?php
namespace App\Classes;


class DB
{
    private static $con = null;

    public static function query($query)
    {
        if (self::$con == null) {
            self::$con = mysqli_connect('localhost', 'root', 'root', 'api');
        }

        return self::$con->query($query);
    }
}