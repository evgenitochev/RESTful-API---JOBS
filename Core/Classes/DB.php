<?php
namespace App\Classes;


class DB
{
    private static $con = null;

    public static function query($query)
    {
        if (self::$con == null) {
            self::$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        }

        return self::$con->query($query);
    }
}

