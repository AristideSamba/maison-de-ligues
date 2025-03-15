<?php
  $titrePage = "Connexion";
  $pageCss = "theme.css";
  include_once "./controller/head.inc.php";

?>

<body>
  <main>
    <section class="img_acceuil">
      <h1>M2L</h1>
      <p>Connectez vous à M2L</p>
    </section>
    <section class="section_form">
      <ul>
        <li><a href="accueil.php">Accueil</a></li>
        <li><a href="collaborateurs.php">Collaborateur</a></li>
        <li><a href="profil.php">Profil</a></li>
      </ul>
      <h2>Pour vous connecter à l'intranet, entrez <br>vos identifiants et mot de passe</h2>
      <form action="" method="post">
        <fieldset>
          <label for="email">Email *</label><br>
          <input type="email" id="email" name="email" placeholder="exemple@gmail.com" required><br>
          <label for="mot_de_passe">Mot de passe *</label><br>
          <input type="password" id="mot_de_passe" name="mot_de_passe" required><br>
          <button type="submit">CONNEXION</button>
        </fieldset>
      </form>
    </section>
  </main>
</body>
</html>