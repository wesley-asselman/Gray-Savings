<?php

class Transaction{
    private $db;

    public function __construct(database $db){
        $this->db = $db;
      }

    public function addTransaction(){

    }

    public function deleteTransaction(){

    }

    public function getTransaction($prodId){
        $data = $this->db->selectWhere('*','transactions', 'productId', $prodId);
        return $data;
    }

    public function sumTransaction($prodId){
        $query = $this->db->selectWhere("SUM(amount)", "transactions","productId",$prodId);
        return $query;
    }

}