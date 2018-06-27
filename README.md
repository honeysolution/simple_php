<h3>Making PHP simple for Freshers.</h3>

<h4>Configure your database</h4>

<p> Open config->database.php <br>
    $database['localhost'] = ''; -> specify your host name<br>
    $database['username'] = ''; -> username of your database <br>
    $database['password'] = ''; -> password of your database <br>
    $database['database'] = ''; -> database name <br>
</p>

<h4> Database operations : </h4>

<p>1.Select data from database : selectfromdb($table_name);  <br> -- $table_name - your database table from which you have to fetch data.</p>
<p>2.Select single row database : selectsinglerecord($table_name,$arr); <br> -- $table_name - your database table from which you have to fetch data.<br> 
-- $arr : array of data in where condition eg. $arr['Id'] = 1; means where Id = 1</p>
