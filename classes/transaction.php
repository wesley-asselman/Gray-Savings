<?php

class Transaction{

    use Connectable;

    public function addTransaction(){

    }

    public function deleteTransaction(){

    }

    public function getTransactions($prodId){
        $sql = "SELECT * FROM transactions WHERE productId = :productId";

        $data = $this->dbh->pdo->prepare($sql);
        $data->execute([
            ':productId' => $prodId,
        ]);
        return $data;
    }

    public function sumTransaction($prodId){
        $query = $this->dbh->prepare("SUM(amount)", "transactions","productId",$prodId);
        return $query;
    }

}