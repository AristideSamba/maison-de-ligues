<?php

// Récupération de l'URL de la photo de profil à partir de la session
if (isset($_SESSION["photo_profil"])) {
  $photo_profil_url = $_SESSION["photo_profil"];
} else {
  // Si l'URL de la photo n'est pas disponible, on utilise ma photo par defaut
  $photo_profil_url = "./asset/default-profil.jpg";
}