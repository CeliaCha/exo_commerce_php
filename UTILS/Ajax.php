<?php 
include('Database.php');
Database::connect();

if (isset($_GET['nomarticle'])) {
  $nomarticle = $_GET['nomarticle'];
  $idarticle = Database::getId('articles', 'nom', $nomarticle )['id'];
  $prixarticle = Database::read('articles', 'prix', $idarticle)['prix'];
  echo $prixarticle;
}

if (isset($_GET['getlist'])) {
  $response = Database::read('commandes_articles');


  // $nomarticle = $_GET['nomarticle'];
  // $idarticle = Database::getId('articles', 'nom', $nomarticle )['id'];
  // $prixarticle = Database::read('articles', 'prix', $idarticle)['prix'];
  //echo $prixarticle;
}

            // var showId = document.createElement('td');
            // var showNom = document.createElement('td');
            // var showPrix = document.createElement('td');
            // var showQuantite = document.createElement('td');