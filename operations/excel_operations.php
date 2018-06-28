<?php 
/* 
Created By : Aakash C.Aware

Website : www.akashaware.tech

Date : 26-06-2018

File Name : operations.php

Description : database related operations.
*/



class Excel extends connect{
     
     public function ReadData($file){
         $array = array();
         $row = 1;
         if (($handle = fopen($file["tmp_name"], "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            $row++;
            for ($c=0; $c < $num; $c++) {
                $dm[$c] =  $data[$c];
            }
            array_push($array,$dm);
        }
        fclose($handle);
        }
        if(sizeof($array)) 
            return $array;
         else
             return 0;
     }
      
}

?>