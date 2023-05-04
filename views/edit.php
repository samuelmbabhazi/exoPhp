<?php
include '/var/www/zabibuPhp.test/helpers/validation.php'; 



if ($_SERVER['REQUEST_METHOD']=='GET') {
 
  $id=$_GET["id"];

  $row =$employeRepo->getEmployeById($id);

  $name=$row["name"];
  $email=$row["email"];
  $phone=$row["phone"];
  $address=$row["address"];
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    $id=$_POST["id"];
    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $address=$_POST["address"];



    $employeRepo->updateEmploye($name,$email,$phone,$address,$id);
    
    

   
 

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Humanres</title>
</head>
<body>
    <div class="flex flex-col justify-center items-center">
        <h2 class="text-[30px] font-bold uppercase">Mises a jour</h2>
        <?php
        if (!empty($errorMessage)) {
            echo "
                <div class='p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400'>
                <strong>$errorMessage</strong>
                <button type='button' aria-label='close'>X</button>
                </div>

            ";
        } 
        ?>

        <form method="post" class="flex bg-[white] rounded-md p-20 shadow-md justify-center items-center flex-col">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="mb-6">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                <div>
                    <input type="text" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo "$name" ?>">
                </div>
                <?php if(!empty($taberror["name"])){
                        echo  "<span class='text-[red]'>$taberror[name]</span>";
                    }
                  ?>
            </div>
            <div class="mb-6">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <div>
                    <input type="text" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo "$email" ?>">
                </div>
                <?php if(!empty($taberror["email"])){
                        echo  "<span class='text-[red]'>$taberror[email]</span>";
                    }
                  ?>
            </div>
            <div class="mb-6">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telephone</label>
                <div>
                    <input type="text" name="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo "$phone" ?>">
                </div>
                <?php if(!empty($taberror["phone"])){
                        echo  "<span class='text-[red]'>$taberror[phone]</span>";
                    }
                  ?>
            </div>
            <div class="mb-6">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                <div>
                    <input type="text" name="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo "$address" ?>">
                </div>
                <?php if(!empty($taberror["address"])){
                        echo  "<span class='text-[red]'>$taberror[address]</span>";
                    }
                  ?>
            </div>
            <?php
             if (!empty($successMessage)) {
                echo "
                    <div class='p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-red-400'>
                    <strong>$successMessage</strong>
                    <button type='button' aria-label='close'>X</button>
                    </div>
    
                ";
            } 
            ?>
            <div class="flex justify-center items-center" >
                
                <div class="flex">
                    <button type="submit" class='focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900' >Submit</button>
                </div>
                <div class="flex">
                   <a href="/index.php" class='focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900' role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
    
</body>
</html>