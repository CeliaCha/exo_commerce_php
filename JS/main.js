console.log('main.js here');


// Affichage prix articles en dynamique
$('#selected-article').change(function(){
    displayArticlePrice($(this).val());
})

function displayArticlePrice(nomarticle) {
    const url = '../UTILS/Ajax.php?action=getprix&nomarticle=' + nomarticle ;
    $.get(url,
        response => {
            $('#display-prix').text(response + ',00 €');
        }, 'text'
    );
}

//Affichage tableau articles commandés

$('#add-commandearticle').submit(function () {
    console.log('test')
    //displayArticlesList();
});

function displayArticlesList() {
    const url = '../UTILS/Ajax.php?action=getlist' ;
    $.get(url,
        response => {
            //var tableArticles = $('#list-articles');
            // var showId = document.createElement('td');
            // var showNom = document.createElement('td');
            // var showPrix = document.createElement('td');
            // var showQuantite = document.createElement('td');


            console.log(response)


        }, 'json'
    );
}


