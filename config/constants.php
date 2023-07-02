<?php 
    //strat session
    session_start();


    //create constants to store repeating values
    define('SITEURL', 'http://localhost/Usha/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'usha');

    //execute query and save data in database
    $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error()); //databse connectin
    $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error()); //seclecting database

?>