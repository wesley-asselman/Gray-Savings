<?php

class ReadCookie{

    public function read($cookiename = 'appstate'){

        if(isset($_COOKIE['appstate'])){
            $data = unserialize($_COOKIE['appstate'], ["allowed_classes" => false]);
            return $data;
        }
    }
}

?>