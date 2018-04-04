

<?php

include 'UTILS/View.php';

//View::scripts();

// Affichage page initiale :
// View::element("h2", "Ajout références");
// View::formAddArticle();
// View::formAddClient();
// View::formAddVendeur();
// echo "<hr/></br>";
echo "<h2>Ajout commandes</h2>";
View::formAddCommande();
//View::tableArticles();
// Exécution de l'app :
if (!empty($_POST)) {
  if ((!empty($_POST['add-article']))) {
    $newArticle = new Article($_POST['nom-article'], $_POST['prix-article'], $_POST['id-vendeur']);
    $newArticle->create();
  }
  else if ((!empty($_POST['add-client']))) {
    $newClient = new Client($_POST['nom-client'], $_POST['prenom-client']);
    $newClient->create();
  }
  else if ((!empty($_POST['add-vendeur']))) {
    $newVendeur = new Vendeur($_POST['nom-vendeur'], $_POST['prenom-vendeur']);
    $newVendeur->create();
  }

  // Affichage formulaire de commande
  else if (!empty($_POST['add-commande'])) {

    $idclient = Database::getId('clients','nom', $_POST['nom-client'])['id'];
    $date = $_POST['date-commande']; 
    $newCommande = new Commande($date, $idclient);
    $newCommande->create();

    $_SESSION['id-newcommande'] = Database::getLastId('commandes');
    View::formAddCommandeArticle();
  }
  else if (!empty($_POST['add-commandearticle'])) {
    $idArticle = Database::getId('articles', 'nom', $_POST['selected-article'])['id'];
    $quantiteArticle = (int)$_POST['quantite-article'];
    // var_dump($idArticle);
    // echo '</br>';
    // var_dump((int)$_POST['quantite-article']);
    // die();
    $newCommandeArticle = new CommandeArticle($quantiteArticle, $idArticle, $_SESSION['id-newcommande']);
    $newCommandeArticle->create();
  }
}

?>

