<?php


use model\Product;
use model\ProductDB;
use model\DBConnection;


class ProductController
{
    public $connect;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=product", "root", "12345678");
        $this->connect = new ProductDB($connection->connect());
    }

    public function index()
    {
        $products = $this->connect->getAll();
        include "view/list.php";


    }

    public function add()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET"){
            include "view/add.php";
        }else{
            $name = $_POST['name'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $produce = $_POST['produce'];

            $product = new Product($name, $price, $description, $produce);
            $this->connect->create($product);
            include "view/add.php";
            header("Location: index.php");
        }
    }

    public function delete(){
        if ($_SERVER["REQUEST_METHOD"] == "GET"){
            $id = $_GET['id'];
            $product = $this->connect->get($id);
            include "view/delete.php";
        }else{
            $id = $_POST['id'];
            $this->connect->delete($id);
            header("Location: index.php");
        }
    }

    public function edit(){
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $id = $_GET['id'];
            $product = $this->connect->get($id);
            include "view/update.php";
        }else {
            $id = $_POST['id'];
            $product = new Product($_POST['name'], $_POST['price'], $_POST['description'], $_POST['produce']);
            $this->connect->edit($id, $product);
            header("Location: index.php");
        }
    }
}