<?php

class App
{
    static function redirect($location){
        header( 'location: index.php?page=' . $location);
        exit;
    }

}