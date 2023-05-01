<?php
include 'dbconnect.php';

$name="";
$email="";
$phone="";
$address="";

$errorMessage="";

$sucessMessage="";

if ($_SERVER['REQUEST_METHOD']=='POST') {
    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $address=$_POST["address"];

    do {
        if (empty($name)||empty($email)||empty($phone)||empty($address)) {
            $errorMessage="All the fields are required";
            break;
        }
        $sql="INSERT INTO employes (name,email,phone,address) VALUES ('$name','$email','$phone','$address')";
        $result=$connection->query($sql);

        if (!$result) {
            $errorMessage="Invalid query: " .$connection->error;
            break;
        }

        $name="";
        $email="";
        $phone="";
        $address="";   
        
        $sucessMessage="AJouter avec succees";
        header("location:/index.php");
        exit;
        
    } while (false);
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
            <div>
                <label for="">Name</label>
                <div>
                    <input type="text" name="name" value="<?php echo $name; ?>">
                </div>
            </div>
            <div>
                <label for="">Email</label>
                <div>
                    <input type="text" name="email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div>
                <label for="">Phone</label>
                <div>
                    <input type="text" name="phone" value="<?php echo $phone; ?>">
                </div>
            </div>
            <div>
                <label for="">Address</label>
                <div>
                    <input type="text" name="address" value="<?php echo $address; ?>">
                </div>
            </div>
            <?php
             if (!empty($successMessage)) {
                echo "
                    <div>
                    <strong>$successMessage</strong>
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