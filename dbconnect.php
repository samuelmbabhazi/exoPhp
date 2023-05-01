<?php 
    $servername="localhost";
    $username="phpmyadmin";
    $password="password";
    $database="humanress";

    $connection=new mysqli($servername,$username,$password,$database);
        if ($connection->connect_error) {
                die("Connection failed:" .$connection->connect_error);
        } 

?>