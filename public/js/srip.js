//pour supprimer les personnes
//récupérer les deleteButton et ajouter un écouteur d'évènement
jQuery(document).ready(function() {
    $('button.buttonDeleteBtn').on("click", function(evt) {
        let url = $(this).data('href');
        console.log(url);
        $.ajax({
            url: url,
            type: 'DELETE',
            success: function(result) {
                console.log(result);
                // Do something with the result
                window.location.href = '/produits';
                /* window.location.replace("/produits"); */
            }
        });
    });
});