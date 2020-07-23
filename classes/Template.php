<?php

//includes relative to the index.php location.
//might rebuild to a global relativity later.

class Template{

    public static function incHeader(){
        require "templates/header.php";
    }

    public static function incFooter(){
        require "templates/footer.php";
    }

    public static function incNavbar(){
        require "templates/navbar.php";
    }

    public static function incOptions(){
        require "templates/options.php";
    }

    public static function incAddPlan(){
        require "templates/addplan.php";
    }

}