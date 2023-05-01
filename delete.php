<?php
if (isset($_GET["id"])) {
    $id=$_GET["id"];
    include 'dbconnect.php';
    $sql="DELETE FROM employes WHERE id=$id";
    $connection->query($sql);
}   

header("location:/index.php");
exit;

?>