<?php

require "config/database.php";

class Connection
{

    private $connection;

    public static function getConnection()
    {

        try {
            @$pdoConfig  = "mysql:host=" . DB_HOST . ";";
            @$pdoConfig .= "dbname=" . DB_NAME . ";";

            try {
                if (!isset($connection)) {
                    @$connection = new PDO($pdoConfig, DB_USER, DB_PASSWORD);
                    @$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
                return $connection;
            } catch (PDOException $e) {
                throw new Exception($e->getMessage());
            }
        } catch (Exception $e) {
            header("HTTP/1.1 500 Internal Server Error");
            throw new Exception("An error has occurred on the server. Please contact the developer.", 1);
        }
    }
}
