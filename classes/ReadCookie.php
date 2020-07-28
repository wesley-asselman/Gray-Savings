<?php

class ReadCookie{

    function read($cookiename = 'appstate'){

        if(isset($_COOKIE['appstate'])){
            $data = unserialize($_COOKIE['appstate'], ["allowed_classes" => false]);
            return $data;
        }
    }

}

?>