<?php

abstract class Game
{

    public $id = 0;
    public $name = null;
    public $price = 0;
    public $company = null;
    public $category = null;

    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function getId(): int
    {
        return $this->id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function getName(): string
    {
        return $this->name;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }
    public function getPrice(): int
    {
        return $this->price;
    }

    public function setCompany(int $company): void
    {
        $this->company = $company;
    }
    public function getCompany(): int
    {
        return $this->company;
    }

    public function setCategory(int $category): void
    {
        $this->category = $category;
    }
    public function getCategory(): int
    {
        return $this->category;
    }
}

class GameRequests extends Game
{

    public function createGame()
    {
    }

    public static function readGames()
    {
        $connection = Connection::getConnection();
        $query = $connection->prepare("SELECT * FROM `games`");
        
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
        
    }
}
