<?php

class product{
    private $db;

    public function __construct(database $db){
        $this->db = $db;
      }

      public function addProduct($name, $link, $image, $price, $userId) {
        $stmt = $this->dbh->prepare("INSERT INTO products (productName, productImg, productLink, productPrice, userId) VALUES (:productName, :productImg, :productLink, :productPrice, :userId)");
        $stmt->execute(array(
        ':productName' => $name,
        ':productLink' => $link,
        ':productImg' => $image,
        ':productPrice' => $price,
        ':userId' => $userId,
        ));
        return $stmt;
    }

    public function deleteProduct(){

    }

    public function editProductLink(){

    }

    public function editProductName(){

    }

    public function editProductImage(){

    }

    public function getProducts(){
        $data = $this->db->selectWhere('*', 'products', 'userId', $_SESSION['userId']);
        return $data;
    }

    public function getProduct($prodId){
        $data = $this->db->selectWhere('*', 'products', 'productId', $prodId);
        return $data;
    }
}