<?php

namespace classes;

use PDOException;
use PDO;

class DbConnector{
    
    public function establishConnection() {
        return $this->connect();
    }

    protected function connect(){
        try {
            $dbuser = "root";
            $dbpass = "";
            $con = new PDO ('mysql:host=localhost; dbname=quizzifynew', $dbuser, $dbpass);
            return $con;
        } catch (PDOException $exc) {
            print "Error: ". $exc->getMessage() . "<br>";
            die();
        }
    }
}