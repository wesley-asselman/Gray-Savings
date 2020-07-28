<?php

    trait NeedsCookie{

        function read(){

            if(isset($_COOKIE['appstate'])){
                $data = unserialize($_COOKIE['appstate'], ["allowed_classes" => false]);
                return $data;
            }
        }

    }

?>