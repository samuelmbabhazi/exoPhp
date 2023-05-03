<?php 
include 'db.php';


$connection = $db->getConnection();

class EmployesRepository {
  private $connection;

  public function __construct($connection) {
    
    $this->connection = $connection;
  }

  public function getAllEmployes() {
    $sql = "SELECT * FROM employes";
    $result = $this->connection->query($sql);
    if(!$result){
        die("Invalid query: " .$connection->error);
    }else{
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
  }

  

  

  public function createEmploye($name, $email,$phone,$address) {
    $stmt = $this->connection->prepare("INSERT INTO employes (name, email, phone, address) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone, $address);
    $stmt->execute();
    $successMessage= 'Les données ont été insérées avec succès dans la base de données.';
    header("location:/index.php");
    exit;
  }
  public function getEmployeById($id) {
    $stmt = $this->connection->prepare("SELECT * FROM employes WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
  }

  public function updateEmploye( $name, $email,$phone,$address,$id) {
    $stmt = $this->connection->prepare("UPDATE employes SET name = ?, email = ?, phone= ? ,address = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $name, $email,$phone,$address, $id);
    $stmt->execute();
    $successMessage="client updated correctly";

    
    
  }

  public function deleteEmploye($id) {
    $stmt = $this->connection->prepare("DELETE FROM employes WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("location:/index.php");
    exit;
  }
}
$employeRepo=new EmployesRepository($connection);
?>