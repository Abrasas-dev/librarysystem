<?php

include 'def.php';

class Database{

    public $con;

    public function __construct(){
        $this->con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        
        if(mysqli_connect_errno()){
            echo 'Error connecting to server '. mysqli_connect_errno();
        }
        // else{
        //     echo 'Successfully connected to server';
        // }
        return $this->con;
    }

}

$db = new Database;