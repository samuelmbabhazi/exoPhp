<?php
 
 include '/var/www/zabibuPhp.test/employes/employes.controllers.php';

if (isset($_GET["id"])) {
    $id=$_GET["id"];
    $controller->deleteItem($id);
}   



?>