<?php

class Connection
{
    public function getConnection()
    {
        return new PDO("mysql:host=localhost;dbname=closeapart","root","root",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }    
}

?>