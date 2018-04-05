<?php

include_once('Database.php');
Database::connect();

class View {
    public static function element($balise, $content, $id=NULL) {
        $element = "<{$balise} id={$id}>{$content}</{$balise}>";
        echo $element;
    }
    public static function formAddArticle () {
        $element = "<form action='app.php' method='post' >
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
        $element = "<form action='app.php' method='post'>
            <label for='nom-vendeur'>Nom vendeur :</label>
            <input required type='text' id='nom-vendeur' name='nom-vendeur'>
            <label for='prenom-vendeur'>Prénom vendeur :</label>
            <input required type='text' id='prenom-vendeur' name='prenom-vendeur'>
        <input type='submit' name='add-vendeur' value='Submit'>
        </form>";
        echo $element;
    }
    public static function formAddClient () {
        $element = "<form action='app.php' method='post'>
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
        "<h2>Ajouter commande : </h2>
        <form action='app.php' method='post'  class='form-inline'>
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
            <input type='submit' name='add-commande' value='Ajouter commande'>
        </form>";
        echo $element;
    }
    public static function formAddCommandeArticle () {
        $element ="
        <h2 class='table-row table-bordered table-dark text-center p-3 mb-5'>BON DE COMMANDE</h2>
        <form class='table table-striped table-bordered table-hover' action='app.php' method='post'>
  
        <select class required id='selected-article' name='selected-article'>
        <option selected value='nothing'>Choisir article</option>";
        $articles =  Database::readAll('articles', 'nom');
        foreach ($articles as $article) {
            $element .= "<option value='{$article['nom']}'>{$article['nom']}</option>";
        }
        $element .= "</select>
        <span id='display-prix'>0,00 €</span>
        <label for='quantite-article'>Quantité :</label>
        <input required type='number' id='quantite-article' name='quantite-article' value='Quantité'>
        <input id='add-commandearticle' type='submit' name='add-commandearticle' value='Ajouter'>
        </form>
        ";
        echo $element;
    }
    public static function tableArticles () {
        $idNewCommande = $_SESSION['id-newcommande'];
        $reqTable = 
        "SELECT commandes_articles.id_com,  articles.nom, commandes_articles.quantite, articles.prix
        FROM articles INNER JOIN commandes_articles
        ON articles.id = commandes_articles.id_art
        WHERE commandes_articles.id_com = {$idNewCommande}";
        $table = Database::customReadQuery($reqTable);
        
        $reqTotal = 
        "SELECT SUM(articles.prix * commandes_articles.quantite) 
        FROM articles INNER JOIN commandes_articles 
        ON articles.id = commandes_articles.id_art 
        WHERE commandes_articles.id_com = {$idNewCommande} ";
        $total = Database::customReadQuery($reqTotal);
        $total = $total[0]['SUM(articles.prix * commandes_articles.quantite)'];
        //var_dump($total[0]['SUM(articles.prix * commandes_articles.quantite)']);

        $element = "
        <table class='table table-striped table-bordered table-hover '>
        <thead>
          <tr>
            <th scope='col' class='w-10'>ID COMMANDE</th>
            <th scope='col'>ARTICLE</th>
            <th scope='col'>QUANTITE</th>
            <th scope='col'>PRIX</th>
          </tr>
        </thead>
        <tbody id='list-articles' >
        ";
        foreach ($table as $row) {
            $element .= "<tr>";
            foreach ($row as $data) {
                $element .= "<td>{$data}</td>";
            }
            $element .= "</tr>";
        }
        $element .= "  
        <tr>
         
            <td colspan='3'>TOTAL</td>
            <td id='total-commande'>{$total},00 € </td>
          </tr> 
        </tbody>
        </table>
        <form class='d-flex justify-content-end table-row table-striped table-bordered table-hover' action='app.php' method='post'>
        <input id='end-commande' type='submit' name='end-commande' value='Valider commande'>
        </form>";
        echo $element;
    }
}

?>

 <!-- <table class='table table-dark'>
   <thead>
     <tr>
       <th scope='col'>Id</th>
       <th scope='col'>Article</th>
       <th scope='col'>Prix</th>
       <th scope='col'>Quantité</th>
     </tr>
   </thead>
   <tbody id='list-articles' > -->
     <!-- <tr>
       <td>$id</td>
       <td>$nomarticle</td>
       <td>$prixarticle</td>
       <td>$quantitearticle</td>
     </tr>
   </tbody>
 </table> -->
