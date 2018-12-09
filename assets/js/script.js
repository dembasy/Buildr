// Des que le document sera prêt
function searchPostalCode() {
    // une condition qui fera apparaitre les valeur seulement à partir du troisième caractère 
    if ($('#postalCode').val().length >= 3)
        // on va pouvoir grace au  $.post() aller chercher d'envoyer des données dans le controlleur pour l'enregistrement d'un utilisateur
        $.post('../../controllers/registerCtl.php', {
            postalCodeSearch: $('#postalCode').val()
        // Cette fonction stocke ce que l'on veut récupérer dans l'option
        }, function (cityName) {
            // L'option city est donc vide 
            $("#city").empty();
            // Donc pour chaque cityName 
            $.each(cityName, function (cityKey, cityValue) {
                // la fonction append va permettre d’ajouter du contenu HTML
                $("#city").append('<option value="' + cityValue.id + '">' + cityValue.cityName + " " + '</option >')
            });
        }, 'JSON');
}
$(document).ready(function () {

    // On cachera de base l'élement non voulu donc c'est à dire firm
    if ($("#company").val() == 2) {
        // on va affiché l'input pour qu'il puisse s'inscrire en tant que Professionelle 
        $('#firm').show();
        $('#firm-label').show();
        // Autrement le champs restera caché
    } else {
        $('#firm').hide();
        $('#firm-label').hide();
    }
    // on va pouvoir créer l'évenement qui va permettre donc que quand l'option company sera séléctionner 
    $("#company").on('change', function () {
        // Et si la valeur de l'option est = à 2 qui correspond au Professionelle
        if ($("#company").val() == 2) {
            // on va affiché l'input pour qu'il puisse s'inscrire en tant que Professionelle 
            $('#firm').show();
            $('#firm-label').show();
            $('#firm-p').show();

            // Autrement le champs restera caché
        } else {
            $('#firm').hide();
            $('#firm-label').hide();
            $('#firm-p').hide();
        }
    });

// Requête Ajax pour le Code postal

    // Grâce à l'évenement keyup on va pouvoir lui demander qu'à partir du moment ou l'on appuiera sur une touche un évement se déclenchera 
    $('#postalCode').keyup(function () {
        // une condition qui fera apparaitre les valeur seulement à partir du troisième caractère 
        searchPostalCode();
    });
});