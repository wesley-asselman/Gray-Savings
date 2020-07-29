<?php

class Transaction{

    use Connectable;

    public function add($request){
        $sql = "INSERT INTO transactions (amount, productId) VALUES (:amount, :productId)";
        if ($request->get('posamount')){
            $amount = $request->get('posamount');
        }

        if ($request->get('negamount')){
            $amount =  "-". $request->get('negamount');
        }

        $amount = str_replace(",", ".", $amount);

        $data = $this->dbh->pdo->prepare($sql);
        $data->execute([
            ':amount' => $amount,
            ':productId' => $request->get('productId')
        ]);

        return $data;
    }

    public function delete($request){
        $sql = "DELETE FROM transactions WHERE transactionId = :transactionId";

        $stmt = $this->dbh->pdo->prepare($sql);
        $stmt->execute([
        ':transactionId' => $request->get('transactionId'),
        ]);

        return $stmt;
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
        $sql = "SELECT SUM(amount) FROM transactions WHERE productId = :productId";

        $data = $this->dbh->pdo->prepare($sql);
        $data->execute([
            ':productId' => $prodId,
        ]);

        while($result = $data->fetch(PDO::FETCH_ASSOC)){
            $total = $result['SUM(amount)'];
        }
        return $total;
    }

}