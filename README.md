<h3>Making PHP simple for Freshers.</h3>

<h4>Configure your database</h4>

<p> Open config->database.php <br>
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
<p>7.Delete data : deletedata($table,$arr)</p>
