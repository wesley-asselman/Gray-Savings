<?php

class product{
    private $db;

    public function __construct(database $db){
        $this->db = $db;
      }

    public function addProduct(){

    }

    public function deleteProduct(){

    }

    public function editProductLink(){

    }

    public function editProductName(){

    }

    public function editProductImage(){

    }

    public function getProduct(){
        $data = $this->db->select('*','products');
        return $data;
    }
}