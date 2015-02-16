<?php
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_HOST', 'localhost');
define('DB_NAME', 'cms');

try
{
  $connection = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);

}catch(PDOExeception $e)
  {
    exit('Database error.');
  }

// $connection = mysql_connect (DB_HOST,DB_USER,DB_PASS) or die (mysql_error()); //Connect zu DB mit User und PW
// mysql_select_db(DB_NAME) or die (mysql_error());

?>
