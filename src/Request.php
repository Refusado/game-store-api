<?php

require "Connection.php";
require "Game.php";

class Request extends Game
{

    public function getGames()
    {
        $connection = Connection::getConnection();

        if ($this->getId() === 0) {
            $data = $connection->query("SELECT * FROM `games`");
            $result = $data->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as &$game) {
                $game['id'] = intval($game['id']);
            }

            return $result;
        } else {
            $query = $connection->prepare("SELECT * FROM `games` WHERE `id` = :_id");
            $query->bindValue(":_id", $this->getId(), PDO::PARAM_INT);

            if ($query->execute()) {
                if ($query->rowCount() == 0) {
                    header("HTTP/1.1 404 Not Found");
                    throw new Exception("Game with id '" . $this->getId() . "' not found", 1);
                }

                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as &$game) {
                    $game['id'] = intval($game['id']);
                }

                return $result;
            }
        }
    }

    public function insertGame()
    {
        $connection = Connection::getConnection();

        $lastRow = $connection->query("SELECT `id` FROM `games` ORDER BY `id` DESC LIMIT 1");
        $lastId = $lastRow->fetchColumn();
        $nextId = intval($lastId) + 1;

        try {
            $query = $connection->prepare("INSERT INTO `games` VALUES (:_id, :_name, :_price, :_category, :_company)");
            $query->bindValue(":_id", $nextId, PDO::PARAM_INT);
            $query->bindValue(":_name", $this->getName(), PDO::PARAM_STR);
            $query->bindValue(":_price", $this->getPrice(), PDO::PARAM_STR);
            $query->bindValue(":_category", $this->getCategory(), PDO::PARAM_STR);
            $query->bindValue(":_company", $this->getCompany(), PDO::PARAM_STR);

            if ($query->execute()) {
                $this->setId($nextId);
                return $this->getGames();
            }
        } catch (Exception $e) {
            if (preg_match('/\b23000\b/', $e->getMessage())) {
                throw new Exception('Error setting ID.', 1);
            }
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
            foreach ($gameToDelete as &$game) {
                $game['id'] = intval($game['id']);
            }

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
