<?php
session_start();

require '/var/www/zabibuPhp.test/vendor/autoload.php';

include '/var/www/zabibuPhp.test/helpers/employesRepository.php';



use Sirius\Validation\Validator;


$validator = new Validator();

$validator->add('name', 'required');
$validator->add('email', 'required | email');
$validator->add('phone', 'required');
$validator->add('address', 'required');

if ($_SERVER['REQUEST_METHOD']=='GET') {
 
    $id=$_GET["id"];
  
    $row =$employeRepo->getEmployeById($id);
  
    $name=$row["name"];
    $email=$row["email"];
    $phone=$row["phone"];
    $address=$row["address"];
  }


if ($_SERVER['REQUEST_METHOD'] =='POST') {
    $data = $_POST;

    if ($validator->validate($data)) {
    
        $employeRepo->updateEmploye($data['name'], $data['email'], $data['phone'], $data['address'],$data['id']);
        
          
    } else {

    
       $taberror=[];
       
        foreach ($validator->getMessages() as $field => $messages) {
           
            $taberror[$field] = sprintf('%s',implode(', ', $messages));
           

       }  
       $_SESSION['taberror'] = $taberror;
       
    }
}

?>