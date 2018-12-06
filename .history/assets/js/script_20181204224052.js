// Des que le document sera prêt
$(document).ready(function () {
    // On cachera de base l'élement non voulu donc c'est à dire firm
    $('#firm').hide();
    $('#firm-label').hide();
    // on va pouvoir créer l'évenement qui va permettre donc que quand l'option company sera séléctionner 
  $("#company").on('change',function () {
      // Et si la valeur de l'option est = à 2 qui correspond au Professionelle
    if($("#company").val() == 2) {
        // on va affiché l'input pour qu'il puisse s'inscrire en tant que Professionelle 
        $('#firm').show();
        $('#firm-label').show();
        // Autrement le champs restera caché
    } else {
        $('#firm').hide();
        $('#firm-label').hide();    
    }
  });
});
// Requête Ajax pour le Code postal
$(function () {
    // Grâce à l'évenement keyup on va pouvoir lui demander qu'à partir du moment ou l'on appuiera sur une touche un évement se déclenchera 
    $('#postalCode').keyup(function () {
        // une condition qui fera apparaitre les valeur seulement à partir de trois caractères 
        if ($('#zipCode').val().length >= 3)
        // on va pouvoir grace au  $.post() aller chercher d'envoyer des données dans le controlleur pour l'enregistrement d'un utilisateur
        $.post('../../controllers/registerCtl.php', {
            // Firm reveal when the option is selected
            postalCodeSearch: $('#postalCode').val()
            // Cette fonction stocke ce que l'on veut récupérer dans l'option
        }, function (cityName) {
            // L'option city est donc vide 
            $("#city").empty();
            // Donc pour chaque cityName on 
            $.each(cityName, function(cityKey, cityValue){
                // Firm reveal when the option is selected
                $("#city").append('<option value="' + cityValue.id + '">' + cityValue.postalCode + " " + cityValue.cityName + " " + '</option >')
                });
        }, 'JSON');
    });
});


$(function () {
    $('email').blur(function () {
        $.post('controllers/registerCtl.php', { email: $(this).val() }, function (data) {
            if (data == 1) {
                $('email').addClass('bg-danger');
                $('#register').hide();
            } else {
                $('email').removeClass('bg-danger');
                $('#register').show();
            }
        },
            'JSON');
    });
});



//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
// 
// $(".deactivation").prop('disabled', true);
// $("#modify").removeAttr('disabled');
// $(".save").prop('disabled', true);

