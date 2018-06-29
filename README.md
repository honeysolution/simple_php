<h3>Making PHP simple for Freshers.</h3>

<h4>To use simple_php in your project include index.php in your files</h4>

<h4>Configure your database</h4>

<p> Open config->database.php <br><br>
    $database['localhost'] = ''; -> specify your host name<br>
    $database['username'] = ''; -> username of your database <br>
    $database['password'] = ''; -> password of your database <br>
    $database['database'] = ''; -> database name <br>
</p>

<h4> Database operations : </h4>

<p>1.Select data from database : selectfromdb($table_name);  <br>  $table_name - your database table from which you have to fetch data.</p>
<p>2.Select single row from database : selectsinglerecord($table_name,$arr); <br> $table_name - your database table from which you have to fetch data.<br> 
$arr : array of data in where condition eg. $arr['Id'] = 1; means where Id = 1</p>
<p>3.Select array of rows from  database : selectsinglerecord($table_name,$arr); <br> $table_name - your database table from which you have to fetch data.<br> 
$arr : array of data in where condition eg. $arr['Id'] = 1; means where Id = 1</p>
<p>4.Select array of rows from  database custom query : customqueryarray($query); <br> $query - select COUNT(*) from table_name;</p>
<p>5.Select single row from  database custom query : customquerysingle($query); <br> $query - select COUNT(*) from table_name;</p>
<p>6.Update data : updatedata($table,$update,$arr) <br> $update - array of data to update;</p>
<p>7.Delete data : deletedata($table,$arr)</p><br><br>

<h4> Image Uploading : </h4>
<p>1.Simple image upload : image_upload($image_file,$image_name,$save_path)  <br>
$image_file = uploaded image. eg $_FILES['image].<br>
$image_name = name of image (1waxsc) . Dont specify .jpg or .png etc.<br>
$save_path = correct path where to save image.    
</p><br>
<p>2.BASE64 to IMAGE and upload : string_image_upload($image_name,$image_file,$save_path,$width,$height).<br>
$width = width of image to save.
$height = height of image to save.
</p><br>
<p>3.Upload image ( Image compression ) : upload_image_with_compression($image_name,$image_file,$save_path,$width,$height).</p><br>
<p>4.Upload Video : upload_video($image_name,$image_file,$save_path).</p><br>
<p>5.Upload PDF : upload_pdf($image_name,$image_file, $save_path).</p><br>
<p>6.Upload any file : upload_any_file($image_name,$image_file, $save_path).</p><br>

<h4>Import / Export Data (using PHPexcel Library)</h4>
<p>1.Import excel and view in array : read_excel_file($file);  uploaded file. eg $_FILES['file]</p><br>
<p>2.Export to  excel: convert_excel($data,$title,$filename,$fontsize);<br>
1.$data : Array of data to export.<br> 
2.$title : title to file.<br> 
3.$filename : file name to save excel. <br>   
4.$fontsize : fontsize.    <br> 
</p><br>