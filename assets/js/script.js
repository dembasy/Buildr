$(document).ready(function () {
    $('#firm').hide();
    $('#firm-label').hide();
  $("#company").on('change',function () {
    if($("#company").val() == "Professionnel"){
        $('#firm').show();
        $('#firm-label').show();
    }else{
        $('#firm').hide();
        $('#firm-label').hide();    
    }
  });
});
$(function () {
    $('#postalCode').keyup(function () {
        $.post('../../controllers/usersCtl.php', {
            postalCodeSearch: $('#postalCode').val()
        }, function (data) {
            console.log(data); 
        }, 'JSON');
    });
});