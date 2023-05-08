<?php 
session_start();

require '/var/www/zabibuPhp.test/vendor/autoload.php';


use Sirius\Validation\Validator;

function validateform($data){

$validator = new Validator();

$validator->add('name', 'required');
$validator->add('email', 'required | email');
$validator->add('phone', 'required');
$validator->add('address', 'required');

$_SESSION['name']=$_POST['name'];
$_SESSION['email']=$_POST['email'];
$_SESSION['phone']=$_POST['phone'];
$_SESSION['address']=$_POST['address'];

if($validator->validate($data)){
    return true; 
} 
       
    }

?>