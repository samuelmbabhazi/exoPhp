<?php 
$ini = parse_ini_file('config.ini');

    $servername=$ini['servername'];
    $username=$ini['username'];
    $password=$ini['password'];
    $database=$ini['database'];

    $connection=new mysqli($servername,$username,$password,$database);
        if ($connection->connect_error) {
                die("Connection failed:" .$connection->connect_error);
        } 

?>