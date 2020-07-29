<?php

class User{

    use Connectable;

    public function loginCookie($request) {
        $sql = "SELECT * FROM users";
        $sql .= " WHERE userEmail = :userEmail";

        $query = $this->dbh->pdo->prepare($sql);
        $query->execute([
            ':userEmail' => $request->get('userEmail'),
        ]);

        while($result = $query->fetch(PDO::FETCH_ASSOC)){
        if ($request->get('userEmail') == $result["userEmail"] && $request->get('userPassword') == password_verify($request->get('userPassword'), $result["userPassword"])){
            $userId = $result["userId"];
            $userName = $result['userName'];
            $user = array(
                "id" => $userId,
                "name" => $userName
            );
            setcookie("appstate", serialize($user), time() + (86400), "/");
            header('location: index.php?page=dashboard');
         }else{
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

        $this->readCookie = new ReadCookie;
        $data = unserialize($_COOKIE['appstate'], ["allowed_classes" => false]);
        $sql = "UPDATE users SET userName = :userName WHERE userId = :userId";

        $stmt = $this->dbh->pdo->prepare($sql);
        $stmt->execute([
            ':userName' => $request->get('userName'),
            ':userId' => $request->get('userId')
        ]);

        $userName = $request->get('userName');
        $userId = $request->get('userId');
        $user = array(
            "id" => $userId,
            "name" => $userName
        );

        setcookie("appstate", serialize($user), time() + (86400));

        return $stmt;
    }
}