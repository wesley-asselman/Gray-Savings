<?php

class Location
{
    function headerLoc($Location){
        header( 'location: index.php?page=' . $Location);
    }

}