<?php
session_start();

include '../helpers/validation.form.php';

include 'employes.repository.php';




class Service
{
  private $employeRepo;
  private $validator;

  public function __construct($employeRepo, $validator)
  {
    $this->employeRepo = $employeRepo;
    $this->validator = $validator;
  }

  public function getItems()
  {
    $this->employeRepo->getAllEmployes();

  }

  public function createItem($data)
  {
    $errors = $this->validator->validate($data);

    if (empty($errors)) {
      // Les données du formulaire sont valides
      $this->employeRepo->createEmploye($data['name'], $data['email'], $data['phone'], $data['address']);
    } else {
      // Les données du formulaire sont invalides, afficher les erreurs de validation
      $taberror = [];

      foreach ($errors as $field => $messages) {

        $taberror[$field] = sprintf('%s', implode(', ', $messages));
      }
      $_SESSION['taberror'] = $taberror;
    }


  }

  public function updateItem($data)
  {

    $errors = $this->validator->validate($data);

    if (empty($errors)) {
      // Les données du formulaire sont valides
      $this->employeRepo->updateEmploye($data['name'], $data['email'], $data['phone'], $data['address'], $data['id']);
    } else {
      // Les données du formulaire sont invalides, afficher les erreurs de validation
      $taberror = [];

      foreach ($errors as $field => $messages) {

        $taberror[$field] = sprintf('%s', implode(', ', $messages));
      }
      $_SESSION['taberror'] = $taberror;
    }



  }

  public function deleteItem($id)
  {
    $this->employeRepo->deleteEmploye($id);

  }
}
$service = new Service($employeRepo, $validator);