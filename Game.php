<?php

abstract class Game
{

    private $id = 0;
    private $name = null;
    private $price = 0;
    private $company = null;
    private $category = null;

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function getPrice()
    {
        return $this->price;
    }

    public function setCompany($company)
    {
        $this->company = $company;
    }
    public function getCompany()
    {
        return $this->company;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }
    public function getCategory()
    {
        return $this->category;
    }
}