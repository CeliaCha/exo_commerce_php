<?php
include('Database.php');
Database::connect();
// $dbCommerce->connect();

// AJOUTER
// function addArticle($nomarticle, $prixarticle, $idvendeur) {
//     global $dbCommerce;
//     $dbCommerce->insert("INSERT INTO articles (art_nom, art_prix, art_vendeur_id) VALUES ('$nomarticle', '$prixarticle', '$idvendeur')");
// }
// // function addClient($nomclient, $prenomclient) {
// //     global $dbCommerce;
// //     $dbCommerce->insert("INSERT INTO clients (cli_nom, cli_prenom) VALUES ('$nomclient', '$prenomclient')");
// // }
// // function addVendeur($nomvendeur, $prenomvendeur) {
// //     global $dbCommerce;
// //     $dbCommerce->insert("INSERT INTO vendeurs (ven_nom, ven_prenom) VALUES ('$nomvendeur', '$prenomvendeur')");
// // }
// function addCommande($date, $clientid) {
//     global $dbCommerce;
//     $dbCommerce->insert("INSERT INTO commandes (com_date, com_client_id) VALUES ('$date', '$clientid')");
// }
// function addCommandeArticle($quantite, $articleid, $commandeid) {
//     global $dbCommerce;
//     $dbCommerce->insert("INSERT INTO commandes_articles (com_date, com_client_id) VALUES ('$date', '$clientid')");
// }


// // LIRE
// function readArticles() {
//     global $dbCommerce;
//     return $dbCommerce->readAll("SELECT art_nom FROM articles");
// }

// // function readClients() {
// //     global $dbCommerce;
// //     return $dbCommerce->readAll("SELECT cli_nom FROM clients");
// // }

// // function readVendeurs() {
// //     global $dbCommerce;
// //     return $dbCommerce->readAll("SELECT ven_nom FROM vendeurs");
// //}

// function getClientID($nomclient) {
//     global $dbCommerce;
//     return $dbCommerce->readOne("SELECT cli_id FROM clients WHERE cli_nom = '$nomclient'")["cli_id"];
// }

// function getArticleID($nomarticle) {
//     global $dbCommerce;
//     return $dbCommerce->readOne("SELECT art_id FROM articles WHERE art_nom = '$nomarticle'")["art_id"];
// }

// function getArticlePrix($nomarticle) {
//     global $dbCommerce;
//     return $dbCommerce->readOne("SELECT art_prix FROM articles WHERE art_nom = '$nomarticle'")["art_prix"];
// }

// function getLastCommande() {
//     global $dbCommerce;
//     return $dbCommerce->readOne("SELECT MAX(com_id) FROM commandes")["MAX(com_id)"];
// }
