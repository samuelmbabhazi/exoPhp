<?php
session_start();
include 'employes.service.php';




class Controller {
 private $service;
  
  public function __construct(Service $service) {
  $this->service = $service;
  }
  
  public function listItems() {
  // récupérer la liste des éléments depuis le service


  $this->service->getItems();

  
  
  // afficher la liste des éléments
  // ...
  }
  
  
  
  public function createItem($data) {
  // créer un nouvel élément avec les données fournies
  $this->service->createItem($data);
  

  }
  
  public function updateItem($data) {
  // mettre à jour l'élément avec l'ID donné avec les données fournies
  $this->service->updateItem($data);
  
  
  }
  
  public function deleteItem($id) {
  // supprimer l'élément avec l'ID donné
  $this->service->deleteItem($id);
  
  header('Location:../index.php');
  }
  }
  $controller=new Controller($service);



  ?>