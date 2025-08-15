<?php

namespace MyApp;
use PDO;

class DB{
    function connect(){
        $db = new PDO("mysql:host=localhost; dbname=ejob","root","");
       return $db;
    }
}