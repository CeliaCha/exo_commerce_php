<?php

include_once('Database.php');
Database::connect();

class View {
    public static function scripts() {
        $element = "
        <script src='https://code.jquery.com/jquery-3.1.1.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js' integrity='sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q' crossorigin='anonymous'></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js' integrity='sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl' crossorigin='anonymous'></script>
        <script src='JS/main.js'></script>
        ";
        echo $element;
    }
    public static function element($balise, $content, $id=NULL) {
        $element = "<{$balise} id={$id}>{$content}</{$balise}>";
        echo $element;
    }
    public static function formAddArticle () {
        $element = "<form action='app.php' method='post' >
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
        $element = "<form action='app.php' method='post'>
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
        $element = "<form action='app.php' method='post'>
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
        "<form action='app.php' method='post'  class='form-inline'>
        <div class='form-group'>
        <label for='nom-client'>Client :</label>
        <select required class='form-control' id='nom-client' name='nom-client'>";
        $clients = Database::readAll('clients', 'nom');
        foreach ($clients as $client) {
            $element .= "<option value='{$client['nom']}'>{$client['nom']}</option>";
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
        "<form action='app.php' method='post' class='form-inline'>
        <div class='form-group'>
        <label for='selected-article'>Article</label>
        <select required class='form-control' id='selected-article' name='selected-article>";
        $articles =  Database::readAll('articles', 'nom');
        foreach ($articles as $article) {
            $element .= "<option value='{$article['nom']}'>{$article['nom']}</option>";
        }
        $element .= "</select>
        <span id='display-prix'>0,00 €</span>
        <label for='quantite-article'>Quantité</label>
        <input required type='number' id='quantite-article' name='quantite-article'>
        <input id='add-commandearticle' type='submit' name='add-commandearticle' value='Submit'>
        </div>
        </form>";
        echo $element;
    }
    public static function tableArticles () {
        $element =
        "<table class='table table-dark'>
        <thead>
          <tr>
            <th scope='col'>Id</th>
            <th scope='col'>Article</th>
            <th scope='col'>Prix</th>
            <th scope='col'>Quantité</th>
          </tr>
        </thead>
        <tbody id='list-articles' >
          <tr>
            <th scope='row'>$id</th>
            <td>$nomarticle</td>
            <td>$prixarticle</td>
            <td>$quantitearticle</td>
          </tr>
        </tbody>
      </table>
      ";
        echo $element;
    }
}

?>


