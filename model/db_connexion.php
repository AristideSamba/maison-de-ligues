<?php

$root_mail = "root@m2l.com";
$root_password_hash = '$2y$10$qm3eS4f8/cvHNYC0HSd4zufstvlMQHVZk7X2WObGrUdBnGG0l0S/e'; // Hachage du mot de passe

// Informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password_db = "";
$dbname = "maison_de_ligue";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password_db);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $password = $_POST["mot_de_passe"];

        // Vérification du super utilisateur
        if ($email === $root_mail && password_verify($password, $root_password_hash)) {
            session_start();
            $_SESSION["user"] = true;
            $_SESSION["photo_profil"] = "./asset/default-profil.jpg"; // Image par défaut pour le super utilisateur
            header("Location: accueil.php");
            exit();
        } else {
            // Vérification des utilisateurs normaux
            $stmt = $conn->prepare("SELECT * FROM compte_employe WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $utilisateur = $stmt->fetch();

            if ($utilisateur && password_verify($password, $utilisateur['password'])) {
                session_start();
                $_SESSION["utilisateur_id"] = $utilisateur['id'];
                // Vérifier si l'URL de la photo existe
                if (!empty($utilisateur['url'])) {
                    $_SESSION["photo_profil"] = $utilisateur['url'];
                } else {
                    $_SESSION["photo_profil"] = "./asset/default-profil.jpg"; // Image par défaut
                }
                header("Location: accueil.php");
                exit();
            } else {
                echo "Email ou mot de passe incorrect.";
            }
        }
    }
} catch(PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

$conn = null;
?>