<?php

require_once "config/headers.php";
require_once "Connection.php";
require_once "Game.php";

class Request extends Game
{

    public function insertNewGame()
    {
        $connection = Connection::getConnection();

        $query = $connection->prepare("SELECT * FROM `companies` WHERE `company_id` = :_company_id");
        $query->bindValue(":_company_id", $this->getCompany(), PDO::PARAM_INT);
        if ($query->execute() && $query->rowCount() == 0) {
            header("HTTP/1.1 404 Company Not Found");
            throw new Exception("Company with id '" . $this->getCompany() . "' not found", 1);
        }

        $query = $connection->prepare("SELECT * FROM `categories` WHERE `category_id` = :_category_id");
        $query->bindValue(":_category_id", $this->getCategory(), PDO::PARAM_INT);
        if ($query->execute() && $query->rowCount() == 0) {
            header("HTTP/1.1 404 Category Not Found");
            throw new Exception("Category with id '" . $this->getCategory() . "' not found", 1);
        }

        $query = $connection->prepare("INSERT INTO `games` VALUES (NULL, :_name, :_price, :_category, :_company)");
        $query->bindValue(":_name", $this->getName(), PDO::PARAM_STR);
        $query->bindValue(":_price", $this->getPrice(), PDO::PARAM_STR);
        $query->bindValue(":_category", $this->getCategory(), PDO::PARAM_INT);
        $query->bindValue(":_company", $this->getCompany(), PDO::PARAM_INT);

        if ($query->execute()) {
            $this->setId($connection->lastInsertId());
            return $this->getAllGames();
        }
    }

    public function getAllGames()
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
}
