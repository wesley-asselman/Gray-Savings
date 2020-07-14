<?php

//includes relative to the index.php location.
//might rebuild to a global relativity later.

class templates{

    public static function inc_Header(){
        require "templates/header.php";
    }

    public static function inc_Footer(){
        require "templates/footer.php";
    }

    public static function inc_Navbar(){
        require "templates/navbar.php";
    }

}