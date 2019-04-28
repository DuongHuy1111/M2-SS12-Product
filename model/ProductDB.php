<?php

namespace model;

use model\Product;

class ProductDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM `products`";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $resut = $statement->fetchAll();
        $products = [];
        foreach ($resut as $row) {
            $product = new Product($row['name_product'], $row['price'], $row['description_product'], $row['produce']);
            $product->id = $row['id'];
            $products[] = $product;
        }
        return $products;

    }

    public function create($product)
    {
        $sql = "INSERT INTO `products`(`name_product`, `price`, `description_product`, `produce`) VALUES (?, ?, ?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $product->nameProduct);
        $statement->bindParam(2, $product->price);
        $statement->bindParam(3, $product->description);
        $statement->bindParam(4, $product->produce);
        return $statement->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `products` WHERE `id` = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();

    }

    public function get($id)
    {
        $sql = "SELECT * FROM `products` WHERE `id` = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $row = $statement->fetch();
        $product = new Product($row['name_product'], $row['price'], $row['description_product'], $row['produce']);
        $product->id = $row['id'];
        return $product;
    }

    public function edit($id, $product)
    {
        $sql = "UPDATE `products` SET `name_product`= ?,`price`= ?,`description_product`= ?,`produce`= ? WHERE `id` = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $product->nameProduct);
        $statement->bindParam(2, $product->price);
        $statement->bindParam(3, $product->description);
        $statement->bindParam(4, $product->produce);
        $statement->bindParam(5, $id);
        return $statement->execute();
     }
}