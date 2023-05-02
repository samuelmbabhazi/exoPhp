<?php
require __DIR__ . '/vendor/autoload.php';
include 'dbconnect.php';



use Sirius\Validation\Validator;


$validator = new Validator();

$validator->add('name', 'required');
$validator->add('email', 'required | email');
$validator->add('phone', 'required');
$validator->add('address', 'required');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;

    if ($validator->validate($data)) {
    
        

        // Vérifier si la connexion a réussi
        if ($connection->connect_error) {
            die('Erreur lors de la connexion à la base de données : ' . $connection->connect_error);
        }

        // Préparer la requête SQL pour insérer les données dans la table "users"
        $stmt = $connection->prepare("INSERT INTO employes (name, email, phone, address) VALUES (?, ?, ?, ?)");

        // Vérifier si la préparation a réussi
        if (!$stmt) {
            die('Erreur lors de la préparation de la requête : ' . $connection->error);
        }

        // Lier les paramètres à la requête SQL
        $stmt->bind_param('ssss', $data['name'], $data['email'], $data['phone'], $data['address']);

        // Exécuter la requête SQL
        if (!$stmt->execute()) {
            die('Erreur lors de l\'exécution de la requête : ' . $connection->error);
        }

        // Fermer la connexion à la base de données MySQL
        $connection->close();

        $successMessage= 'Les données ont été insérées avec succès dans la base de données.';
        header("location:/index.php");
    } else {
        // Afficher les erreurs de validation
        if (count($validator->getMessages())>1) {
            $errorMessage="All fields is requires";
        }else{
        foreach ($validator->getMessages() as $field => $messages) {
            $errorMessage = sprintf('%s: %s', ucfirst($field), implode(', ', $messages));
        }}
    }
}
?>