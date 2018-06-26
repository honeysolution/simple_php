<?php 
/* 
Created By : Aakash C.Aware

Website : www.akashaware.tech

Date : 26-06-2018

File Name : operations.php

Description : database related operations.
*/
class Operations extends connect{
     
      public function SelectAllRecords($table){
            $connection = $this->connection;
            $query = "select * from $table";
            $result = $connection->query($query);
            if ($result->num_rows > 0) {
                while($rows = $result->fetch_assoc())
                {
                $row[] = $rows;
                }
            } 
            else {
                $row = array();
            }
            return $row;
         }
    
         public function SelectRecordParams($query){    
            $connection = connection(); 
            $result = $connection->query($query);
            if ($result->num_rows > 0) {
                while($rows = $result->fetch_assoc())
                {
                $row[] = $rows;
                }
            } 
            else {
                $row = array();
            }
            return $row;
         }
    
        public function SingleRecordParams($query){    
            $connection = connection();
            $result = $connection->query($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_object();
            } 
            else {
                $row = array();
            }
            return $row;
         }
    
        public function InsertData($query){
            $connection = connection();
            if ($connection->query($query) === TRUE) {
                $last_id = $connection->insert_id;
            } else {
                $last_id = $connection->error;
            }
            return $last_id;
        }
    
        public function CommonOperation($query){
            $connection = connection();
            if ($connection->query($query) === TRUE) {
                $last_id = 1;
            } else {
                $last_id = $connection->error;
            }
            return $last_id;
        }
}

?>