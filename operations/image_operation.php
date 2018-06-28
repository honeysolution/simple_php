<?php 
/* 
Created By : Aakash C.Aware

Website : www.akashaware.tech

Date : 26-06-2018

File Name : ArrayFunction.php

Description : Function  interface between database and user 
*/

class Image extends config{
        
        public $ImageSize;
    
        public $UploadImage;
    
        public $Extension;
    
        public function ImageSize() {
            $a = 1048576;
            $b = $this->config['images_size'];
            return $a * $b;
        }
        
        public function Extension(){
            return $this->config['allowed_images'];
        }
        public function UploadImage($image_path, $save_path) {
           $didUpload =  move_uploaded_file($image_path,$save_path);
           if($didUpload == 1) 
               return true;
            else
                return false;
        }
    
        public function ExtractImage($image){
            $temp = explode(';',$image)[0];

            if($temp == 'data:image/png'){
                $img = str_replace('data:image/png;base64,', '', $image);
            }
            elseif($temp == 'data:image/jpg'){
               $img = str_replace('data:image/jpg;base64,', '', $image);
            } 
            elseif($temp == 'data:image/jpeg'){
                $img = str_replace('data:image/jpeg;base64,', '', $image);
            }
            else{
                echo "non supported image format : please upload png,jpg,jpeg only"; 
                exit;     
            }  
            $buffer = base64_decode($img);
            return $buffer;
        }
    
        public function SaveStringImage($save_path ,$image_name,$width,$height,$image_string) {
            header("Content-Type: image/jpeg");           
            $image = imagecreatefromstring($image_string);
            $new_image = imagecreatetruecolor($width, $height);
            imagecopyresampled($new_image, $image, 0, 0, 0, 0, $width, $height, imagesx($image), imagesy($image));
            $isupload =  imagejpeg($new_image, $save_path.$image_name); // saving the image
            header("Content-Type: text/html");
            return $isupload;
            
            
        }
    
        public function CreateImage($extension,$image_file){
            if($extension == "jpg" || $extension == "jpeg" || $extension == "JPG" || $extension == "JPEG") {
                $image =  imagecreatefromjpeg($image_file);
            }
            elseif($extension == "png" || $extension == "PNG") {                
                $image =  imagecreatefrompng($image_file);
            } 
            elseif($extension == "gif" || $extension == "GIF"){
                $image =  imagecreatefromgif($image_file);
            }
            else {
                return 'non supported image format : please upload png,jpg,jpeg,gif only';
                exit;    
            }
            return $image;
        }
        public function UploadCompressImage($image_name,$image_created,$save_path,$width='',$height='') {
    
            if($width == '' && $height=='') {
            list($width,$height) = getimagesize($uploadedfile);
            $newwidth = 60;
            $newheight =($height/$width)*$newwidth;
            $width =  $newwidth;
            $height = $newheight;    
            }
            $image_color = imagecreatetruecolor($width,$height);
            imagecopyresampled($image_color, $image_created, 0, 0, 0, 0, $width, $height,imagesx($image_created), imagesy($image_created));
            
            $isupload = imagejpeg($image_color,$save_path);
            imagedestroy($image_color);
            return $isupload;
            
        }
            
}


?>