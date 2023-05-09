<?php
include '../employes/employes.controllers.php';


$error = $_SESSION['taberror'];
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $id = $_GET["id"];

    $row = $employeRepo->getEmployeById($id);

    $name = $row["name"];
    $email = $row["email"];
    $phone = $row["phone"];
    $address = $row["address"];



}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST;
    $controller->updateItem($data);

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
                    <input type="text" name="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="<?php echo $_SESSION['name']; ?>">
                </div>
                <?php if (!empty($error["name"])) {
                    echo "<span class='text-[red]'>$error[name]</span>";
                }
                ?>
            </div>
            <div class="mb-6">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <div>
                    <input type="text" name="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="<?php echo $_SESSION['email']; ?>">
                </div>
                <?php if (!empty($error["email"])) {
                    echo "<span class='text-[red]'>$error[email]</span>";
                }
                ?>
            </div>
            <div class="mb-6">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telephone</label>
                <div>
                    <input type="text" name="phone"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="<?php echo $_SESSION['phone']; ?>">
                </div>
                <?php if (!empty($error["phone"])) {
                    echo "<span class='text-[red]'>$error[phone]</span>";
                }
                ?>
            </div>
            <div class="mb-6">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                <div>
                    <input type="text" name="address"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="<?php echo $_SESSION['address']; ?>">
                </div>
                <?php if (!empty($error["address"])) {
                    echo "<span class='text-[red]'>$error[address]</span>";
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
            <div class="flex justify-center items-center">

                <div class="flex">
                    <button type="submit"
                        class='focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900'>Submit</button>
                </div>
                <div class="flex">
                    <a href="/index.php"
                        class='focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900'
                        role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>

</body>

</html>