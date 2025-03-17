<?php 
  //initialisation de la session
  session_start();
  $titrePage = "Accueil";
  $pageCss = "accueil.css";


  //inclusion du head
  include_once "./controller/head.inc.php";

  //inclusion de la récupération de la photo de profil
  include_once "./controller/photoProfil.inc.php";

?>
<body>
  <header>
    <h1>M2L</h1>
    <nav>
      <ul>
        <li><a href="collaborateurs.php"><img src="./asset/customer.png" alt=""> Collaborateurs</a></li>
        <li class="img-employe"><a href="profil.php"><img src="<?php print $photo_profil_url; ?>" alt=""></a></li> <!--Ajout de la variable pour la photo de profil-->
        <li><a href="deconnexion.php"><img src="./asset/power-off.png" alt="Icone de deconnexion"> Déconnexion</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <section class="welcome-word">
      <h2>Bienvenue sur M2L, la plateforme qui vous permet de retrouver tous vos collaborateurs</h2>
    </section>
    <section class="home-employee">
      <h2>Avez vous dit bonjour à:</h2>
      <div class="info-employee">
        <h3>Informatique</h3>
        <div class="image-profil">
          <img src="./asset/tamara-bellis-Brl7bqld05E-unsplash.jpg" alt="">
        </div>
        <ul>
          <li>Aristide SAMBA 30 ans</li>
          <li>Lyon, France</li>
          <li>sambaa@samba.com</li>
          <li>+33 05 02 02 01 02</li>
          <li>Anniversaire: 25 février</li>
        </ul>
      </div>
      <button>DIRE BONJOUR A QUELQU'UN D'AUTRE</button>
    </section>
  </main>
</body>
</html>