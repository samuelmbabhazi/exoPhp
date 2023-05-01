<?php
 include 'dbconnect.php';
 if ($connection->connect_error) {
     die("Connection failed:" .$connection->connect_error);
 } 

$id="";
$name="";
$email="";
$phone="";
$address="";


$errorMessage="";

$sucessMessage="";

if ($_SERVER['REQUEST_METHOD']=='GET') {
  if (!isset($_GET["id"])) {
    header("location:/index.php");
    exit;
  }
  $id=$_GET["id"];

  $sql="SELECT * FROM employes WHERE id=$id";
  $result=$connection->query($sql);
  $row=$result->fetch_assoc();

  if (!$row) {
    header("location:/index.php");
    exit;
  }
  $name=$row["name"];
  $email=$row["email"];
  $phone=$row["phone"];
  $address=$row["address"];
}
else{
    $id=$_POST["id"];
    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $address=$_POST["address"];


do {
    if (empty($id)||empty($name)||empty($email)||empty($phone)||empty($address)) {
        $errorMessage="All the fields are required";
        break;
    }

    $sql="UPDATE employes SET name='$name',email='$email',phone='$phone',address='$address' WHERE id=$id";
    $result=$connection->query($sql);
    if(!$result){
        $errorMessage="Invalid query: " . $connection->error;
        break;
    }
    $successMessage="client updated correctly";

    header("location:/index.php");
    exit;
 } while (true);
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Humanres</title>
</head>
<body>
    <div class="container">
        <h2>Nouveau employes</h2>
        <?php
        if (!empty($errorMessage)) {
            echo "
                <div>
                <strong>$errorMessage</strong>
                <button type='button' aria-label='close'></button>
                </div>

            ";
        } 
        ?>

        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div>
                <label for="">Name</label>
                <div>
                    <input type="text" name="name" value="<?php echo "$name" ?>">
                </div>
            </div>
            <div>
                <label for="">Email</label>
                <div>
                    <input type="text" name="email" value="<?php echo "$email" ?>">
                </div>
            </div>
            <div>
                <label for="">Phone</label>
                <div>
                    <input type="text" name="phone" value="<?php echo "$phone" ?>">
                </div>
            </div>
            <div>
                <label for="">Address</label>
                <div>
                    <input type="text" name="address" value="<?php echo "$address" ?>">
                </div>
            </div>
            <?php
             if (!empty($successMessage)) {
                echo "
                    <div>
                    <strong>$errorMessage</strong>
                    <button type='button' aria-label='close'></button>
                    </div>
    
                ";
            } 
            ?>
            <div>
                
                <div>
                    <button type="submit" >Submit</button>
                </div>
                <div>
                   <a href="/index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
    
</body>
</html>