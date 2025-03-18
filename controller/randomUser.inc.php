<?php
// controller/random_user.php

// Informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password_db = "";
$dbname = "maison_de_ligue";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password_db);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer un utilisateur aléatoire et formater l'anniversaire
    $stmt = $conn->query("SELECT *, DATE_FORMAT(dateNaissance, '%d/%m') as anniversaire FROM compte_employe ORDER BY RAND() LIMIT 1");
    $utilisateur_aleatoire = $stmt->fetch();

    if ($utilisateur_aleatoire) {
        $dateNaissance = new DateTime($utilisateur_aleatoire['dateNaissance']);
        $aujourdhui = new DateTime();
        $age = $aujourdhui->diff($dateNaissance)->y;

        $nom = $utilisateur_aleatoire['nom'];
        $ville = $utilisateur_aleatoire['ville'];
        $email = $utilisateur_aleatoire['email'];
        $telephone = $utilisateur_aleatoire['telephone'];
        $anniversaire = $utilisateur_aleatoire['anniversaire'];
        $photo_profil_aleatoire = $utilisateur_aleatoire['url'];
    } else {
        echo "Aucun utilisateur trouvé.";
        $nom = "";
        $age = "";
        $ville = "";
        $email = "";
        $telephone = "";
        $anniversaire = "";
        $photo_profil_aleatoire = "./asset/default-profil.jpg";
    }

} catch(PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

$conn = null;