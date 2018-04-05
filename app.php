<?php

session_start();
include 'UTILS/View.php';

// Affichage formulaire initialisation commande si pas de commande en cours :
if (!isset($_SESSION['id-newcommande']) ) {
  View::formAddCommande();
}
else {
  View::formAddCommandeArticle();
  View::tableArticles();
}
  
if (!empty($_POST)) {

  // Ajout commande :
   if (!empty($_POST['add-commande'])) {
    $idclient = Database::getId('clients','nom', $_POST['nom-client'])['id'];
    $date = $_POST['date-commande']; 
    $newCommande = new Commande($date, $idclient);
    $newCommande->create();

    $_SESSION['id-newcommande'] = Database::getLastId('commandes');
    header('location: index.php');
  }

  // Ajout commande_article :
  else if (!empty($_POST['add-commandearticle'])) {
    $idArticle = Database::getId('articles', 'nom', $_POST['selected-article'])['id'];
    $quantiteArticle = (int)$_POST['quantite-article'];
    $newCommandeArticle = new CommandeArticle($quantiteArticle, $idArticle, $_SESSION['id-newcommande']);
    $newCommandeArticle->create();
    header('location: index.php');
  }

  // Validation commande :
  else if (!empty($_POST['end-commande'])) {
    session_unset();
    header('location: index.php');
  }

  // Ajout références  :
  else if ((!empty($_POST['add-article']))) {
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
}
?>

