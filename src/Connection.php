<?php

require "src/config/headers.php";
require "config/environment.php";

class Connection
{
    private $connection;

    public static function getConnection()
    {

        try {
            @$pdoConfig  = "mysql:host=" . DB_HOST . ";";
            @$pdoConfig .= "dbname=" . DB_NAME . ";";
            @$pdoConfig .= "charset=utf8mb4";

            try {
                if (!isset($connection)) {
                    @$connection = new PDO($pdoConfig, DB_USER, DB_PASS,);
                    @$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
                return $connection;
            } catch (PDOException $e) {
                throw new Exception("An error has occurred on the server. Try again later.", 1);
            }
        } catch (Exception $e) {
            header("HTTP/1.1 500 Internal Server Error");
            throw new Exception("An error has occurred on the server. Try again later.", 1);
        }
    }
}
