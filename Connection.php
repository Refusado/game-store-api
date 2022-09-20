<?php

class Connection
{

    private static $connection;

    public static function getConnection()
    {

        @$pdoConfig  = "mysql:host=" . DB_HOST . ";";
        @$pdoConfig .= "dbname=" . DB_NAME . ";";

        try {
            if (!isset($connection)) {
                $connection = new PDO($pdoConfig, DB_USER, DB_PASSWORD);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return $connection;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
}
