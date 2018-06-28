<?php 
/* 
Created By : Aakash C.Aware

Website : www.akashaware.tech

Date : 26-06-2018

File Name : ExcelFunction.php

Description : Functions to read and download excel file
*/

    function read_excel_data($file){
       $excel = new Excel();
       return $excel->ReadData($file);
         
    }

?>