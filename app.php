<?php

include 'UTILS/View.php';

View::scripts();

// Affichage page initiale :
// View::element("h2", "Ajout références");
// View::formAddArticle();
// View::formAddClient();
// View::formAddVendeur();
// echo "<hr/></br>";
echo "<h2>Ajout commandes</h2>";
View::formAddCommande();

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
    // View::tableArticles();

    if (!empty($_POST['add-commandearticle'])) {
      die("ici");
      $idArticle = Database::getId('articles', 'nom', $_POST['nom-article']);
      $newCommandeArticle = new CommandeArticle($_POST['quantite-article'], $idArticle, $_SESSION['id-newcommande']);
      $newCommandeArticle->create();
    }
  }
}

?>

    <script src='https://code.jquery.com/jquery-3.1.1.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js' integrity='sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q' crossorigin='anonymous'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js' integrity='sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl' crossorigin='anonymous'></script>
    <script src='JS/main.js'></script>