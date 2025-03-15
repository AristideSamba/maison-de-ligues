<?php
$titrePage = "Collaborateurs";
$pageCss = "collaborateurs.css";
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
      <h2>LISTE DES COLLABORATEURS</h2>
      <form class="search-bar">
        <input type="text" placeholder="RECHERCHER">
        <button type="submit" title="RECHERCHER"><img src="./asset/search.png" alt="" class="search-icon"></button>
      </form>
    </section>
    <aside>
      <h3><img src="./asset/filter.png" alt="">FILTRER</h3>
      <form action="" method="post">
        <fieldset>
          <label for="nom">Rechercher par:</label><br>
          <select id="nom" name="nom">
            <option value="nom">Nom</option>
            <option value="prenom">Prénom</option>
          </select><br>
          <label for="categorie">Catégorie</label><br>
          <select id="categorie" name="categorie">
            <option value="informatique">Informatique</option>
            <option value="ressourceshumaines">Ressources Humaines</option>
          </select><br>
          <label for="ville">Localisation:</label><br>
          <select id="ville" name="ville">
            <option value="paris">Paris</option>
            <option value="lyon">Lyon</option>
            <option value="marseille">Marseille</option>
            <option value="nante">Nantes</option>
          </select><br>
        </fieldset>
      </form>
    </aside>
  </main>
</body>
</html>