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
   
    function read_excel_file($file){
        $config = new Config();
        $excel = new Excel();
        $allow = $config->config['allowed_files'];
        $fileType = pathinfo($file['name'],PATHINFO_EXTENSION);       
        if(in_array(strtolower($fileType),$allow)=== false){
             return "Invalid file type.";
             exit;
        }
        return $excel->ReadExcelFile($file['tmp_name']);
    }
    function convert_excel($exceldata,$title,$filename,$fontsize) {
        $excel = new Excel();
        return $excel->convert($exceldata,$title,$filename,$fontsize);
    }

?>