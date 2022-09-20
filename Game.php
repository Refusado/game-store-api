<?php

class Game
{

    private $id = 0;
    private $name = null;
    private $price = 0;
    private $brand = null;
    private $category = null;

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

    public function setBrand(int $brand): void
    {
        $this->brand = $brand;
    }
    public function getBrand(): int
    {
        return $this->brand;
    }

    public function setCat(int $cat): void
    {
        $this->category = $cat;
    }
    public function getCat(): int
    {
        return $this->category;
    }
}
