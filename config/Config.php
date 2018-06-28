<?php 
/* 
Created By : Aakash C.Aware

Website : www.akashaware.tech

Date : 26-06-2018

File Name : Config.php

Description : Website configuration
*/
class config {
    
    public $config;
     
    public function __construct(){
        
        $config['base_path'] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

        $config['allowed_images'] = array("jpeg","jpg","png");
        
        $config['images_size'] = 2; // size in mb
        
        $this->config = $config;
    
        return $this->config;
    }
    

}




?>