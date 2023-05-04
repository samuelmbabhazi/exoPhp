<?php
 
 include '/var/www/zabibuPhp.test/helpers/employesRepository.php';

if (isset($_GET["id"])) {
    $id=$_GET["id"];
    $employeRepo->deleteEmploye($id);
}   



?>