<?php 

class Database {
    public function connect_db($username,$password, $db){
        $conn = mysqli_connect("localhost", $username, $password, $db);
            die("Connection failed: " . mysqli_connect_error());
        }
        return $conn;
        }
        
        public function SelectAllRecords($table,$connection){
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
    
         public function SelectRecordParams($query,$connection){             
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
    
        public function SingleRecordParams($query,$connection){             
            $result = $connection->query($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_object();
            } 
            else {
                $row = array();
            }
            return $row;
         }
    
        public function InsertData($query,$connection){
            if ($connection->query($query) === TRUE) {
                $last_id = $connection->insert_id;
            } else {
                $last_id = $connection->error;
            }
            return $last_id;
        }
    
        public function CommonOperation($query,$connection){
            if ($connection->query($query) === TRUE) {
                $last_id = 1;
            } else {
                $last_id = $connection->error;
            }
            return $last_id;
        }
    
     
    }
         
     



?>