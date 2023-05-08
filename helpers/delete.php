<?php
 
 include '/var/www/zabibuPhp.test/employes/employes.repository.php';

if (isset($_GET["id"])) {
    $id=$_GET["id"];
    $employeRepo->deleteEmploye($id);
    header("Location:../index.php");
}   



?>