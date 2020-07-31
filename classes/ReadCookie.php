<?php

class ReadCookie{

    public function read($cookiename = 'appstate'){

        if(isset($_COOKIE[$cookiename])){
            $data = unserialize($_COOKIE[$cookiename]);
            return $data;
        }
    }
}

?>