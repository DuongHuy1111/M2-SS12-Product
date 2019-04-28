<?php
namespace model;

class Product
{
    public $id;
    public $nameProduct;
    public $price;
    public $description;
    public $produce;

    public function __construct($nameProduct, $price, $description, $produce)
    {
        $this->nameProduct = $nameProduct;
        $this->price = $price;
        $this->description = $description;
        $this->produce = $produce;
    }
}