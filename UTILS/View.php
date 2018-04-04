<?php

include_once('Database.php');
Database::connect();

class View {
    public static function element($balise, $content, $id=NULL) {
        $element = "<{$balise} id={$id}>{$content}</{$balise}>";
        echo $element;
    }
    public static function formAddArticle () {
        $element = "<form action='index.php' method='post' >
            <label for='nom-article'>Article :</label>
            <input required type='text' id='nom-article' name='nom-article'>
            <label for='prix-article'>Prix :</label>
            <input required type='number' id='prix-article' name='prix-article'>
            <label for='id-vendeur'>Id Vendeur :</label>
            <input required type='number' id='id-vendeur' name='id-vendeur'>
          <input type='submit' name='add-article' value='Submit'>

        </form>";
        echo $element;
    }
    public static function formAddVendeur () {
        $element = "<form action='index.php' method='post'>
            <label for='nom-vendeur'>Nom vendeur :</label>
            <input required type='text' id='nom-vendeur' name='nom-vendeur'>
            <label for='prenom-vendeur'>Prénom vendeur :</label>
            <input required type='text' id='prenom-vendeur' name='prenom-vendeur'>
        <input type='submit' name='add-vendeur' value='Submit'>
        </form>";
        echo $element;
    }
    public static function formAddClient () {
        $element = "<form action='index.php' method='post'>
            <label for='nom-client'>Nom client :</label>
            <input required type='text' id='nom-client' name='nom-client'>
            <label for='prenom-client'>Prénom client :</label>
            <input required type='text' id='prenom-client' name='prenom-client'>
          <input type='submit' name='add-client' value='Submit'>

        </form>";
        echo $element;
    }
    public static function formAddCommande () {
        $element = 
        "<form action='index.php' method='post'  class='form-inline'>
        <label for='nom-client'>Client :</label>
        <select required id='nom-client' name='nom-client'>";
        $clients = Database::readAll('clients', 'nom');
        foreach ($clients as $client) {
            $element .= "<option value='{$client['nom']}'>{$client['nom']}</option>";
        }
        $element  .=  
        "</select>
            <label for='date-commande'>Date :</label>
            <input required type='date' id='date-commande' name='date-commande'>

            <input type='submit' name='add-commande' value='Submit'>
        </form>";
        echo $element;
    }
    public static function formAddCommandeArticle () {
        $element =
        "<form action='index.php' method='post' class='form-inline'>
        <label for='selected-article'>Article</label>
        <select required id='selected-article' name='selected-article'>";
        $articles =  Database::readAll('articles', 'nom');
        foreach ($articles as $article) {
            $element .= "<option value='{$article['nom']}'>{$article['nom']}</option>";
        }
        $element .= "</select>
        <span id='display-prix'>0,00 €</span>
        <label for='quantite-article'>Quantité</label>
        <input required type='number' id='quantite-article' name='quantite-article'>
        <input id='add-commandearticle' type='submit' name='add-commandearticle' value='Submit'>
        </form>";
        echo $element;
    }
    public static function tableArticles () {
        $element = "";
        $quantiteArticles = Database::readAll('commandes_articles', 'quantite');
        $idArticles = Database::readAll('commandes_articles', 'id');
        $nomArticles = [];
        foreach ($idArticles as $idArticle) {
            $nomArticle = Database::read('articles', 'nom', $idArticle)['nom'];
            echo $nomArticle;
        }
        $prixArticles = [];
        foreach ($idArticles as $idArticle) {
            $prixArticle = Database::read('articles', 'prix', $idArticle)['prix'];
            echo $prixArticle;
        }
        // $resp->ids = $idArticles;
        // $resp->noms = $nomArticles;
        // $resp->quantites = $quantiteArticles;
        // $resp->prix = $prixArticles;

        // foreach ($resp as $item) {
        //     print_r($item);
        // }

        

    }
}

?>


