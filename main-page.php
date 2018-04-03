<?php

include 'UTILS/View.php';

// Affichage page initiale :
// echo "<h2>Ajout références</h2>";
View::element("h2", "test classe vue");
View::formAddArticle();
View::formAddClient();
View::formAddVendeur();
echo "<hr/></br>";
echo "<h2>Ajout commandes</h2>";
View::formAddCommande();

// Exécution de l'app :
if (!empty($_POST)) {

  // Requêtes d'ajout de références :
  if ((!empty($_POST['add-article']))) {
    addArticle($_POST['nom-article'], $_POST['prix-article'], $_POST['id-vendeur']);
  }
  else if ((!empty($_POST['add-client']))) {
    addClient($_POST['nom-client'], $_POST['prenom-client']);
  }
  else if ((!empty($_POST['add-vendeur']))) {
    addVendeur($_POST['nom-vendeur'], $_POST['prenom-vendeur']);
  }

  // Affichage formulaire de commande
  else if (!empty($_POST['add-commande'])) {

    addCommande($_POST['date-commande'], getClientID($_POST['nom-client']));
    var_dump(getLastCommande());
    $_SESSION['id-newcommande'] = getLastCommande();
    View::formAddCommandeArticle();


  }

  else if (!empty($_POST['add-commandearticle'])) {
    addCommandeArticle($_POST['nom-article'], $_POST['quantite-article']);
    var_dump(getLastCommande());
    $_SESSION['id-newcommande'] = getLastCommande();
  }
}
