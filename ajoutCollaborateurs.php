<?php
$titrePage = "Ajouter un collaborateur";
$pageCss = "profil.css";

include_once "./controller/head.inc.php";

?>
<body>
  <header>
    <h1>M2L</h1>
    <nav>
      <ul>
        <li><a href=""><img src="./asset/customer.png" alt=""> Collaborateurs</a></li>
        <li class="img-employe"><a href="#"><img src="./asset/tamara-bellis-Brl7bqld05E-unsplash.jpg" alt=""></a></li>
        <li><a href=""><img src="./asset/power-off.png" alt=""> Déconnexion</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <section class="section-search">
      <h2>Administrateur</h2>
    </section>
    <section class="profil-form">
      <h2>Ajoutez un collaborateur</h2>
      <form action="" method="post">
        <fieldset>
          <label for="civilite">*Civilité:</label>
          <select id="civilite" name="civilite" required>
            <option value="">Sélectionnez une civilité</option>
            <option value="mr">Mr</option>
            <option value="mme">Mme</option>
          </select><br>
          <label for="categorie">*Catégorie:</label>
          <select id="categorie" name="categorie">
            <option value="informatique">Informatique</option>
            <option value="ressourceshumaines">Ressources Humaines</option>
          </select><br>
          <label for="name">*Nom:</label>
          <input type="text" name="name" id="name"><br>
          <label for="prenom">*Prénom:</label>
          <input type="text" name="prenom" id="prenom"><br>
          <label for="email">*Email:</label>
          <input type="email" id="email" name="email" placeholder="exemple@gmail.com" required><br>
          <label for="mot_de_passe">*Mot de passe:</label>
          <input type="password" id="mot_de_passe" name="mot_de_passe" required><br>
          <label for="confirm_mot_de_passe">Confirmation:</label>
          <input type="password" id="confirm_mot_de_passe" name="confirm_mot_de_passe" required><br>
          <label for="telephone">*Téléphone:</label>
          <input type="tel" id="telephone" name="telephone" placeholder="06XXXXXXXX" required><br>
          <label for="dateNaissance">*Date de naissance :</label>
          <input type="date" id="dateNaissance" name="dateNaissance" required><br>
          <label for="ville">Ville:</label>
          <select id="ville" name="ville">
            <option value="paris">Paris</option>
            <option value="lyon">Lyon</option>
            <option value="marseille">Marseille</option>
            <option value="nante">Nantes</option>
          </select><br>
          <label for="pays">*Pays:</label>
          <select id="pays" name="pays">
            <option value="france">France</option>
            <option value="belgique">Belgique</option>
          </select><br>
          <label for="imageUrl">URL de la photo:</label>
          <input type="url" id="imageUrl" name="imageUrl" placeholder="https://www.exemple.com/image.jpg"><br>
          <button type="submit">AJOUTER</button>
        </fieldset>
      </form>
    </section>
  </main>
</body>
</html>