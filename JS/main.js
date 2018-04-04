console.log('main.js here');


// Affichage prix articles en dynamique
$('#selected-article').change(function(){
    console.log('select article')
    displayArticlePrice($(this).val());
})

function displayArticlePrice(nomarticle) {
    const url = '../UTILS/Ajax.php?action=getprix&nomarticle=' + nomarticle ;
    $.get(url,
        response => {
            console.log(response)
            $('#display-prix').text(response + ',00 €');
        }, 'text'
    );
}

//Affichage tableau articles commandés

// $('#add-commandearticle').click(function () {
//     displayArticlesList();
// });

// function displayArticlesList() {
//     const url = '../UTILS/Ajax.php?action=getlist' ;
//     $.get(url,
//         response => {
//             var tableArticles = $('#list-articles');
//             // var showId = document.createElement('td');
//             // var showNom = document.createElement('td');
//             // var showPrix = document.createElement('td');
//             // var showQuantite = document.createElement('td');


//             console.log(response)


//         }, 'json'
//     );
// }



// <table class='table table-dark'>
//   <thead>
//     <tr>
//       <th scope='col'>Id</th>
//       <th scope='col'>Article</th>
//       <th scope='col'>Prix</th>
//       <th scope='col'>Quantité</th>
//     </tr>
//   </thead>
//   <tbody id='list-articles' >
//     <tr>
//       <td>$id</td>
//       <td>$nomarticle</td>
//       <td>$prixarticle</td>
//       <td>$quantitearticle</td>
//     </tr>
//   </tbody>
// </table>
