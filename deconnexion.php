<?php
session_start(); // Démarrage de la session

// Destruction de toutes les variables de session
session_unset();

// Destruction de la session
session_destroy();

// Redirection de  l'utilisateur vers la page de connexion
header("Location: index.php"); 
exit();