<?php

require "Connection.php";
require "Game.php";

class Request extends Game
{

    public function getGames()
    {
        $connection = Connection::getConnection();

        if ($this->getId() === 0) {
            $query = $connection->prepare("SELECT * FROM `games`");

            if ($query->execute()) {
                return $query->fetchAll(PDO::FETCH_ASSOC);
            }
        } else {
            $query = $connection->prepare("SELECT * FROM `games` WHERE `id` = :_id");
            $query->bindValue(":_id", $this->getId(), PDO::PARAM_INT);

            if ($query->execute()) {
                if ($query->rowCount() == 0) {
                    header("HTTP/1.1 404 Not Found");
                    throw new Exception("Game with id '" . $this->getId() . "' not found", 1);
                }
                return $query->fetchAll(PDO::FETCH_ASSOC);
            }
        }
    }

    public function insertGame()
    {
        $connection = Connection::getConnection();

        $query = $connection->prepare("INSERT INTO `games` VALUES (NULL, :_name, :_price, :_category, :_company)");
        $query->bindValue(":_name", $this->getName(), PDO::PARAM_STR);
        $query->bindValue(":_price", $this->getPrice(), PDO::PARAM_STR);
        $query->bindValue(":_category", $this->getCategory(), PDO::PARAM_STR);
        $query->bindValue(":_company", $this->getCompany(), PDO::PARAM_STR);

        if ($query->execute()) {
            $this->setId($connection->lastInsertId());
            return $this->getGames();
        }
    }

    public function deleteGame()
    {
        $connection = Connection::getConnection();

        $query = $connection->prepare("SELECT * FROM `games` WHERE `id` = :_id");
        $query->bindValue(":_id", $this->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            if ($query->rowCount() == 0) {
                header("HTTP/1.1 404 Not Found");
                throw new Exception("Game with id '" . $this->getId() . "' not found", 1);
            }
            $gameToDelete = $query->fetchAll(PDO::FETCH_ASSOC);

            $query = $connection->prepare("DELETE FROM games WHERE `games`.`id` = :_id");
            $query->bindValue(":_id", $this->getId(), PDO::PARAM_INT);

            if ($query->execute()) {
                return $gameToDelete;
            }
        }
    }

    public function updateGame()
    {
        $connection = Connection::getConnection();
        
        $query = $connection->prepare("SELECT * FROM `games` WHERE `id` = :_id");
        $query->bindValue(":_id", $this->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            if ($query->rowCount() == 0) {
                header("HTTP/1.1 404 Not Found");
                throw new Exception("Game with id '" . $this->getId() . "' not found", 1);
            }

            $queryText  = "UPDATE `games` SET ";
            $queryText .= "`name`               = :_name, ";
            $queryText .= "`price`              = :_price, ";
            $queryText .= "`category`           = :_category, ";
            $queryText .= "`company`            = :_company ";
            $queryText .= "WHERE `games`.`id`   = :_id";

            $query = $connection->prepare("$queryText");
            $query->bindValue(":_name", $this->getName(), PDO::PARAM_STR);
            $query->bindValue(":_price", $this->getPrice(), PDO::PARAM_STR);
            $query->bindValue(":_category", $this->getCategory(), PDO::PARAM_STR);
            $query->bindValue(":_company", $this->getCompany(), PDO::PARAM_STR);
            $query->bindValue(":_id", $this->getId(), PDO::PARAM_INT);

            if ($query->execute()) {
                return $this->getGames();
            }
        }
    }
}