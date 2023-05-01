<?php
if (isset($_GET["id"])) {
    $id=$_GET["id"];
   
    $servername="localhost";
    $username="phpmyadmin";
    $password="password";
    $database="humanress";
    $connection=new mysqli($servername,$username,$password,$database);
    $sql="DELETE FROM employes WHERE id=$id";
    $connection->query($sql);
}   

header("location:/index.php");
exit;

?>