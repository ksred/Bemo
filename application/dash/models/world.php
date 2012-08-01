<?php
class World extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function see () {
        echo("I see the world!");
    }
    
    function hear () {
        echo("I hear");
    }
}
?>
