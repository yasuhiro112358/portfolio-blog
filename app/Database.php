<?php
class Database
{
    private static $mysqli;

    public static function getInstance()
    {
        if (!isset(self::$mysqli)) {
            self::$mysqli = new mysqli(DSN, DB_USER, DB_PASS, DB_NAME);

            if (self::$mysqli->connect_error) { 
                exit("Connection error: " . self::$mysqli->connect_error);
            } else {
                return self::$mysqli;
            }
        }
    }
}