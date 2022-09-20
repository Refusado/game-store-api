<?php

require_once "Game.php";

class GameRequests extends Game
{

    public function createGame()
    {

        // $connection = Connection::getConnection();
        // $query = $connection->prepare("INSERT INTO `games` VALUES (NULL, :_name, :_price, :_company, :_category)");
        // $query->bindValue(":_name", $this->getName(), PDO::PARAM_STR);
        // $query->bindValue(":_price", $this->getPrice(), PDO::PARAM_INT);
        // $query->bindValue(":_company", $this->getCompany(), PDO::PARAM_INT);
        // $query->bindValue(":_category", $this->getName(), PDO::PARAM_INT);
    }

    public function readGames()
    {
        $connection = Connection::getConnection();

        if ($this->getId() === 0) {
            $query = $connection->prepare("SELECT * FROM `games`");
            
            if ($query->execute()) {
                return $query->fetchAll(PDO::FETCH_ASSOC);
            }
        } else if ($this->getId() >0) {
            $query = $connection->prepare("SELECT * FROM `games` WHERE `game_id` = :_id");
            $query->bindValue(":_id", $this->getId(), PDO::PARAM_INT);
            
            if ($query->execute()) {
                return $query->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        
    }
}