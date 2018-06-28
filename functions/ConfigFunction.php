<?php 
/* 
Created By : Aakash C.Aware

Website : www.akashaware.tech

Date : 26-06-2018

File Name : ArrayFunction.php

Description : Function  interface between database and user 
*/

function config_item($item){
     $config = new config();
     return $config->config[$item];
}

?>