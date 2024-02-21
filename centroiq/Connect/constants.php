<?php
    //start session
    //constants to store non redundant values
    session_start();

 define('SITEURL','http://localhost/centroiq/');
 define('LOCALHOST', 'localhost');
 define('DB_USERNAME', 'root');
 define('DB_PASSWORD', '');
 define('DB_NAME', 'centroiq');

 $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //db connection
 $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());    //db selection

?>