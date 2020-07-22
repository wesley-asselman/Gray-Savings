<?php

class Location
{
    function headerLoc($Location){
        header( 'location: index.php?page=' . $Location);
    }

    function dashBoard(){
        header( 'location: index.php?page=dashboard');
    }

    function home(){
        header( 'location: index.php?page=home');
    }

}