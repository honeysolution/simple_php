<?php 
/* 
Created By : Aakash C.Aware

Website : www.akashaware.tech

Date : 26-06-2018

File Name : ImageFunction.php

Description : Functions to upload images and videos
*/

    function image_upload($image_file,$image_name,$save_path){
         $image = new image();
         $allowed_size =  $image->ImageSize();
         $image_path = $image_file['tmp_name'];
         $file_size = $image_file['size'];
         $fileType = pathinfo($image_file['name'],PATHINFO_EXTENSION);
         $image_name = $image_name.".".$fileType;
         $allow = $image->Extension();
         $save_path = $save_path.$image_name;
         if(in_array(strtolower($fileType),$allow)=== false){
             return "Invalid file type.";
             exit;
          }
          if($file_size > $allowed_size) {
             return "Image size exceed.";
             exit;
          }
         $isupload = $image->UploadImage($image_path, $save_path);
         if($isupload) {
             return 'Image uploaded sucessfully';
         }
        else {
            return 'some error occured';
        }
    }
   
    function string_image_upload($image_name,$image_file,$save_path,$width,$height){
        $image = new image();
        $image_string = $image->ExtractImage($image_file);
        $isupload =$image->SaveStringImage($save_path ,$image_name,$width,$height,$image_string);
       
        if($isupload == 1) {
             return 'Image uploaded sucessfully';
         }
        else {
            return 'some error occured';
        }
    }
    function upload_image_with_compression($image_name,$image_file,$save_path,$width,$height){
        $image = new image();
         $allowed_size =  $image->ImageSize();
         $image_path = $image_file['tmp_name'];
         $file_size = $image_file['size'];
         $fileType = pathinfo($image_file['name'],PATHINFO_EXTENSION);
         $image_name = $image_name.".".$fileType;
         $allow = $image->Extension();
         $save_path = $save_path.$image_name;
         if(in_array(strtolower($fileType),$allow)=== false){
             return "Invalid file type.";
             exit;
          }
          if($file_size > $allowed_size) {
             return "Image size exceed.";
             exit;
          }
          $image_created = $image->CreateImage($fileType,$image_path);
          $isupload =  $image->UploadCompressImage($image_name,$image_created,$save_path,$width,$height);
          if($isupload) {
             return 'Image uploaded sucessfully';
            }
        else {
            return 'some error occured';
            }      
    }

    function upload_video($image_name,$image_file,$save_path){
         $image = new image();
         $image_path = $image_file['tmp_name'];
         $allowedExts = array("mp4", "wma", "avi", "mpeg");
         $fileType = pathinfo($image_file['name'],PATHINFO_EXTENSION);
         if(in_array(strtolower($fileType),$allowedExts)=== false){
             return "Invalid video file type.";
             exit;
          }
         $targe_file = $save_path.$image_name.'.'.$fileType;
          $isupload = $image->UploadImage($image_path, $targe_file);
         if($isupload) {
             return 'Video uploaded sucessfully';
         }
        else {
            return 'some error occured';
        }
    }
    function upload_pdf($image_name,$image_file, $save_path){
         $image = new image();
         $image_path = $image_file['tmp_name'];

         $fileType = pathinfo($image_file['name'],PATHINFO_EXTENSION);
         if(strtolower($fileType) != 'pdf') {
              return "Invalid file type.";
              exit;
         }
         $targe_file = $save_path.$image_name.'.pdf';
         $isupload = $image->UploadImage($image_path, $targe_file);
         if($isupload) {
             return 'Pdf uploaded sucessfully';
         }
            else {
            return 'some error occured';
        }
    }
  
    function upload_any_file($image_name,$image_file, $save_path){
       $image = new image();
         $image_path = $image_file['tmp_name'];

         $fileType = pathinfo($image_file['name'],PATHINFO_EXTENSION);
         
         $targe_file = $save_path.$image_name.'.'.$fileType;
         $isupload = $image->UploadImage($image_path, $targe_file);
         if($isupload) {
             return 'File uploaded sucessfully';
         }
            else {
            return 'some error occured';
        } 
    }

?>