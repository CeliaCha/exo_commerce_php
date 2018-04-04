<?php 
include('Database.php');
Database::connect();

if ($_GET['action'] === 'getprix') {
  $nomarticle = $_GET['nomarticle'];
  $idarticle = Database::getId('articles', 'nom', $nomarticle )['id'];
  $prixarticle = Database::read('articles', 'prix', $idarticle)['prix'];
  echo $prixarticle;
}

// else if ($_GET['action'] === 'getlist') {
//     // $quantiteArticles = Database::readAll('commandes_articles', 'quantite');
//     // $idArticles = Database::readAll('commandes_articles', 'id');
//     // $nomArticles = [];
//     // foreach ($idArticles as $idArticle) {
//     //     $nomArticle = Database::read('articles', 'nom', $idArticle);
//     //     array_push($nomArticles, $nomArticle);
//     // }
//     // $prixArticles = [];
//     // foreach ($idArticles as $idArticle) {
//     //     $prixArticle = Database::read('articles', 'prix', $idArticle);
//     //     array_push($prixArticles, $prixArticle);
//     // }
//     // $resp->ids = $idArticles;
//     // $resp->noms = $nomArticles;
//     // $resp->quantites = $quantiteArticles;
//     // $resp->prix = $prixArticles;
    
//     // $respToJSON = json_encode($resp);
//     // echo $respToJSON;
//     echo "success request";

// }

            // var showId = document.createElement('td');
            // var showNom = document.createElement('td');
            // var showPrix = document.createElement('td');
            // var showQuantite = document.createElement('td');

           // read($table, $column, $id) 