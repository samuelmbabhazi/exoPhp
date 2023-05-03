<?php
require __DIR__ . '/vendor/autoload.php';



include 'employesRepository.php';

$employeRepo = new EmployesRepository();

use Sirius\Validation\Validator;


$validator = new Validator();

$validator->add('name', 'required');
$validator->add('email', 'required | email');
$validator->add('phone', 'required');
$validator->add('address', 'required');


if ($_SERVER['REQUEST_METHOD'] ?? 'GET' =='POST') {
    $data = $_POST;

    if ($validator->validate($data)) {
    
        $employeRepo->createEmploye($data['name'], $data['email'], $data['phone'], $data['address']);

    
    } else {

       echo '<pre>'; var_dump($validator->getMessages()) ; echo '</pre>';
        // // Afficher les erreurs de validation
        // if (count($validator->getMessages())>1) {
        //     $errorMessage="All fields is requires";
        // }else{
        // foreach ($validator->getMessages() as $field => $messages) {
        //     $errorMessage = sprintf('%s: %s', ucfirst($field), implode(', ', $messages));
        // }}
    }
}
?>