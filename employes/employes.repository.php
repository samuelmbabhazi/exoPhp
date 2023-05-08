<?php 
include '/var/www/zabibuPhp.test/config/db.php';


$connection = $db->getConnection();

class EmployesRepository {
  
  private$connection;

  public function __construct($connection) {
    
    $this->connection = $connection;
  }

  public function getAllEmployes() {
    $sql = "SELECT * FROM employes";
    $result = $this->connection->query($sql);
    if(!$result){
        die("Invalid query: ");
    }else{
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
  }

  public function createEmploye($name, $email,$phone,$address) {
    $stmt = $this->connection->prepare("INSERT INTO employes (name, email, phone, address) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone, $address);
   
    $result=$stmt->execute();
    
    return $result;
    
  
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
    $result=$stmt->execute();
    
    return $result;
    
    
    
  }

  public function deleteEmploye($id) {
    $stmt = $this->connection->prepare("DELETE FROM employes WHERE id = ?");
    $stmt->bind_param("i", $id);
    $result=$stmt->execute();
    
    return $result;
  }
}
$employeRepo=new EmployesRepository($connection);
?>