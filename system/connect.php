<?php 
/* 
Created By : Aakash C.Aware

Website : www.akashaware.tech

Date : 26-06-2018

File Name : connect.php

Description : connect with database
*/

class connect extends Database{
    
    public function __construct() 
    { 
        $connection = $this->GetConfig();
        $conn = mysqli_connect($connection['localhost'], $connection['username'], $connection['password'], $connection['database']);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $this->connection = $conn;
    }
    public function GetConfig(){
        $database = new Database();
        return $database->db_connection();
    }
}



?>