<?php 
/* 
Created By : Aakash C.Aware

Website : www.akashaware.tech

Date : 26-06-2018

File Name : Config.php

Description : Website configuration
*/

function selectfromdb($table){
     $Operations = new Operations();
     return $Operations->SelectAllRecords($table);
 }

function insertdata($table,$insert){
     $Operations = new Operations();
     $values = '';
     $data = '';
        foreach($insert as $key => $value) {
              if($values == '')
              $values = $key;
              else 
              $values = $values.','.$key;
              if($data == '')
              $data = '"'.$value.'"';
              else 
              $data = $data.',"'.$value.'"';  
        }
    $table = 'pm_purchase_user';
    $query = 'INSERT INTO '.$table.'  ('.$values.') VALUES ('.$data.')';
    return $Operations->InsertData($query);
}
function updatedata($table,$update,$arr){
    $Operations = new Operations();
    $condition = '';
    $array = '';
    foreach($arr as $key => $value) {
        if($condition == '')
         $condition = $key.'='.'"'.$value.'"';
        else
           $condition = $condition.' and '.$key.'='.'"'.$value.'"'; 
    }
    foreach($update as $key => $value) {
        if($array == '')
         $array = $key.'='.'"'.$value.'"';
        else
           $array = $array.','.$key.'='.'"'.$value.'"'; 
    }
    $query = 'UPDATE '.$table.' SET '.$array.' WHERE '.$condition;
    return $Operations->CommonOperation($query);
}

function deletedata($table,$arr){
    $Operations = new Operations();
    $condition = '';    
    foreach($arr as $key => $value) {
        if($condition == '')
         $condition = $key.'='.'"'.$value.'"';
        else
           $condition = $condition.' and '.$key.'='.'"'.$value.'"'; 
    }    
    $query = 'DELETE FROM '.$table.' WHERE '.$condition;
    return $Operations->CommonOperation($query);
}

function selectwithcondition($table,$arr = ''){
    $Operations = new Operations();
    $condition = '';
    if($arr!='' || $arr!=0) {
    foreach($arr as $key => $value) {
        if($condition == '')
         $condition = ' WHERE '.$key.'='.'"'.$value.'"';
        else
           $condition = $condition.' and '.$key.'='.'"'.$value.'"'; 
    } 
    }   
    $query = 'SELECT * FROM '.$table.$condition;
    return $Operations->SelectRecordParams($query);
}

function selectsinglerecord($table,$arr = ''){
    $Operations = new Operations();
     $condition = '';
    if($arr!='' || $arr!=0) {
    foreach($arr as $key => $value) {
        if($condition == '')
         $condition = ' WHERE '.$key.'='.'"'.$value.'"';
        else
           $condition = $condition.' and '.$key.'='.'"'.$value.'"'; 
    } 
    }   
    $query = 'SELECT * FROM '.$table.$condition;
    return $Operations->SingleRecordParams($query);
}

function customqueryarray($query){
    $Operations = new Operations();
    return $Operations->SelectRecordParams($query);
}

function customquerysingle($query){
    $Operations = new Operations();
    return $Operations->SingleRecordParams($query);
}


?>