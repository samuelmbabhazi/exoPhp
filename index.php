
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Humanres</title>
</head>
<body >
    <div class="flex justify-center flex-col items-center p-16 gap-6">
        <h2 class="text-[30px] font-bold uppercase">Liste des employés</h2>
        <a href="/create.php" role="button" class='focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900'>Nouveau</a>
        <br>
        <table class="min-w-full text-left text-sm font-light">
            <thead class="border-b font-medium dark:border-neutral-500">
                <tr>
                    <th  class="px-6 py-4">ID</th>
                    <th  class="px-6 py-4">NOM</th>
                    <th  class="px-6 py-4">EMAIL</th>
                    <th  class="px-6 py-4">PHONE</th>
                    <th  class="px-6 py-4">ADDRESS</th>
                    <th  class="px-6 py-4">CREE</th>
                    <th  class="px-6 py-4">ACTION</th>
                </tr>
            </thead>
            <tbody class="bg-[white] rounded-md p-20 shadow-md" >
                <?php
                include 'dbconnect.php';


                $sql="SELECT * FROM employes";
                $result=$connection->query($sql);

                if(!$result){
                    die("Invalid query: " .$connection->error);
                }
                while($row=$result->fetch_assoc()):
                    ?>  
                    <tr class='border-b dark:border-neutral-500'>
                    <td class='whitespace-nowrap px-6 py-4 font-medium'><?=  $row[id] ?></td>
                    <td class='whitespace-nowrap px-6 py-4'><?=  $row[name] ?></td>
                    <td class='whitespace-nowrap px-6 py-4'><?=  $row[email] ?></td>
                    <td class='whitespace-nowrap px-6 py-4'><?=  $row[phone] ?></td>
                    <td class='whitespace-nowrap px-6 py-4'><?=  $row[address] ?></td>
                    <td class='whitespace-nowrap px-6 py-4'><?=  $row[created_at] ?></td>
                    <td class='flex'>
                        <a href='/edit.php?id=<?= $row[id]?>' class='focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900'>EDIT</a>
                        <a href='/delete.php?id=<?= $row[id] ?>' class='focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900'>DELETE</a>
                    </td>
                </tr> 
                  <?php   ;
                endwhile
              
                ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>