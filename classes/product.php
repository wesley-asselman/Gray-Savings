<?php

class Product implements ResourceInterface
{
    use Connectable;

    public function index()
    {
        $this->template->render('dashboard', ['products' => $this->getAll()]);
    }

    public function getSingle($productId = null)
    {
        $sql = "SELECT * FROM products";
        if ($productId) {
            $sql .= " WHERE productId = :productId";
        }

        $stmt = $this->dbh->pdo->prepare($sql);
        $stmt->execute([
            ':productId' => $productId,
        ]);
        return $stmt;
    }

    public function getAll($user_id = null)
    {
        $sql = "SELECT * FROM products";
        if ($user_id) {
            $sql .= " WHERE userId = :userId";
        }

        $stmt = $this->dbh->pdo->prepare($sql);
        $stmt->execute([
            ':userId' => $user_id,
        ]);
        return $stmt;
    }

    public function delete($request)
    {
        $sql = "DELETE FROM products WHERE productId = :productId";

        $stmt = $this->dbh->pdo->prepare($sql);
        $stmt->execute([
        ':productId' => $request->get('productid'),
        ]);
        return $stmt;
    }

    public function add($request)
    {
        $data = $request->validate(
            [
                'productName' => 'required',
                'productImg' => 'required',
                'productPrice' => 'required',
                'productLink' => 'required',
                'userId' => 'required',
            ]
        );
        // $data = [
        //     'name' => $request->get('name'),
        //     'title' => $request->get('title'),
        // ];

        if (!$data) {
            die('Errors!');
        }

        return $this->store($data);
    }

    protected function store($data)
    {
        if (!$data) {
            die('No data to store');
        }

        $data['productPrice'] = str_replace(",", ".", $data['productPrice']);

        $pdo_data = [];
        foreach ($data as $key => $value) {
            $pdo_data[':' . $key] = $value;
        }

        $sql = "INSERT INTO products (" . implode(', ', array_keys($data)) . ")";
        $sql .= "VALUES (" . implode(', ', array_keys($pdo_data)) . ")";


        $stmt = $this->dbh->pdo->prepare($sql);
        $stmt->execute($pdo_data);

        return $stmt;
    }
}
