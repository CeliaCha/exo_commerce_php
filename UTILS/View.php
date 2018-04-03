<?php

include('App.php');

class View {
    public static function element($balise, $content, $id=NULL) {
        $element = "<{$balise} id={$id}>{$content}</{$balise}>";
        echo $element;
    }
    public static function formAddArticle () {
        $element = "<form action='index.php?page=sitedevente.php' method='post' >
        <div class='form-group'>
            <label for='nom-article'>Article :</label>
            <input required class='form-control' type='text' id='nom-article' name='nom-article'>
            <label for='prix-article'>Prix :</label>
            <input required type='number' id='prix-article' name='prix-article'>
            <label for='id-vendeur'>Id Vendeur :</label>
            <input required type='number' id='id-vendeur' name='id-vendeur'>
          <input type='submit' name='add-article' value='Submit'>
          </div>
        </form>";
        echo $element;
    }
    public static function formAddVendeur () {
        $element = "<form action='index.php?page=sitedevente.php' method='post'>
        <div class='form-group'>
            <label for='nom-vendeur'>Nom vendeur :</label>
            <input required class='form-control' type='text' id='nom-vendeur' name='nom-vendeur'>
            <label for='prenom-vendeur'>Prénom vendeur :</label>
            <input required class='form-control' type='text' id='prenom-vendeur' name='prenom-vendeur'>
        <input type='submit' name='add-vendeur' value='Submit'>
        </div>
        </form>";
        echo $element;
    }
    public static function formAddClient () {
        $element = "<form action='index.php?page=sitedevente.php' method='post'>
        <div class='form-group'>
            <label for='nom-client'>Nom client :</label>
            <input required class='form-control' type='text' id='nom-client' name='nom-client'>
            <label for='prenom-client'>Prénom client :</label>
            <input required class='form-control' type='text' id='prenom-client' name='prenom-client'>
          <input type='submit' name='add-client' value='Submit'>
          </div>
        </form>";
        echo $element;
    }
    public static function formAddCommande () {
        $element = 
        "<form action='index.php?page=sitedevente.php' method='post'>
        <div class='form-group'>
        <label for='nom-client'>Client :</label>
        <select required class='form-control' id='nom-client' name='nom-client'>";
        $clients = readClients();
        foreach ($clients as $client) {
            $element .= "<option value='{$client['cli_nom']}'>{$client['cli_nom']}</option>";
        }
        $element  .=  
        "</select>
            <label for='date-commande'>Date :</label>
            <input required type='date' id='date-commande' name='date-commande'>
            <input type='submit' name='add-commande' value='Submit'>
        </div>
        </form>";
        echo $element;
    }
    public static function formAddCommandeArticle () {
        $element =
        "<form action='index.php?page=sitedevente.php' method='post'>
        <div class='form-group'>
        <label for='selected-article'>Article</label>
        <select required class='form-control' id='selected-article' name='selected-article>";
        $articles = readArticles();
        foreach ($articles as $article) {
            $element .= "<option value='{$article['art_nom']}'>{$article['art_nom']}</option>";
        }
        $element .= "</select>
        <span id='display-prix'>0,00 €</span>
        <label for='quantite-article'>Quantité</label>
        <input required type='number' id='quantite-article' name='quantite-article'>
        <input type='submit' name='add-commandearticle' value='Submit'>
        </div>
        </form>";
        echo $element;
    }
}



