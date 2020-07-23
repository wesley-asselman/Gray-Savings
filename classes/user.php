<?php

class User{

    use Connectable;

    public function login($request) {
        $sql = "SELECT * FROM users";
        $sql .= " WHERE userEmail = :userEmail";

        $query = $this->dbh->pdo->prepare($sql);
        $query->execute([
            ':userEmail' => $request->get('userEmail'),
        ]);

        $_SESSION["loggedin"] = NULL;
        foreach($query as $result){
               if ($request->get('userEmail') == $result["userEmail"] && $request->get('userPassword') == password_verify($request->get('userPassword'), $result["userPassword"])){
                   $_SESSION["loggedin"] = "Welcome " . ucfirst($result["userName"]);
                   $_SESSION["userId"] = $result['userId'];
                   $_SESSION["userName"] = $result['userName'];
                   header('location: index.php?page=home');
                }else{
                    $_SESSION["loggedin"] = NULL;
                    die(header('location: index.php?page=home'));
            }
        }
    }

    public function add($request)
    {
        $data = $request->validate(
            [
                'userName' => 'required',
                'userPassword' => 'required',
                'userEmail' => 'required',
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

        $data['userPassword'] = password_hash($data['userPassword'], PASSWORD_DEFAULT);

        $pdo_data = [];
        foreach ($data as $key => $value) {
            $pdo_data[':' . $key] = $value;
        }

        $sql = "INSERT INTO users (" . implode(', ', array_keys($data)) . ")";
        $sql .= "VALUES (" . implode(', ', array_keys($pdo_data)) . ")";


        $stmt = $this->dbh->pdo->prepare($sql);
        $stmt->execute($pdo_data);

        return $stmt;
    }

    public function editname($request){

        $sql = "UPDATE users SET userName = :userName WHERE userId = :userId";

        $stmt = $this->dbh->pdo->prepare($sql);
        $stmt->execute([
            ':userName' => $request->get('userName'),
            ':userId' => $_SESSION['userId']
        ]);

        $_SESSION['userName'] = $request->get('userName');

        return $stmt;
    }
}