console.log('coucou');

function displayArticlePrice(nomarticle) {
    const url = '../UTILS/Ajax.php?action=getprix&nomarticle=' + nomarticle ;
    $.get(url,
        response => {
            console.log(response)
            $('#display-prix').text(response + ',00 €');
        }, 'text'
    );
}

var selectedArticle = $('#selected-article');
console.log(selectedArticle);
selectedArticle.change(function(){
    //$('#display-prix').text($(this).val());
    (displayArticlePrice($(this).val()));
})