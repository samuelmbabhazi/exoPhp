<?php 
session_start();

require '/var/www/zabibuPhp.test/vendor/autoload.php';
include 'employes.repository.php';
use Sirius\Validation\Validator;



class Service {
private $employeRepo;
  
public function __construct($employeRepo) {
       $this->employeRepo = $employeRepo;
      }
  
public function getItems() {
  $this->employeRepo->getAllEmployes();

}
    
      public function createItem($data) {
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
            $this->employeRepo->createEmploye($data['name'], $data['email'], $data['phone'], $data['address']); 
            header('Location:../index.php');
          
        }
        else{
        
                $taberror=[];
               
                foreach ($validator->getMessages() as $field => $messages) {
                   
                    $taberror[$field] = sprintf('%s',implode(', ', $messages));
              }
              $_SESSION['taberror'] = $taberror;
            }
      }
  
      public function updateItem($data) {
   
        $validator = new Validator();

          $validator->add('name', 'required');
          $validator->add('email', 'required | email');
          $validator->add('phone', 'required');
          $validator->add('address', 'required');
          
          
              if ($validator->validate($data)) {
              
                $this->employeRepo->updateEmploye($data['name'], $data['email'], $data['phone'], $data['address'],$data['id']);
                 
                header('Location:../index.php');
                    
              } else {
          
              
                 $taberror=[];
                 
                  foreach ($validator->getMessages() as $field => $messages) {
                     
                      $taberror[$field] = sprintf('%s',implode(', ', $messages));
                     
          
                 }  
                 $_SESSION['taberror'] = $taberror;
                 
              }
          
      }
  
      public function deleteItem($id) {
        $this->employeRepo->deleteEmploye($id);
        
      }
  }
$service=new Service($employeRepo);
?>