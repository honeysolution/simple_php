<?php 
/* 
Created By : Aakash C.Aware

Website : www.akashaware.tech

Date : 26-06-2018

File Name : Database.php

Description : configure database
*/
class Database {
    
    function db_connection() {
    
    $database['localhost'] = 'localhost';
    $database['username'] = 'root';
    $database['password'] = 'root@250789';
    $database['database'] = 'medical_v1';
    return $database;
        
    }
     
}
         
     



?>