// Firm reveal when the option is selected
$(document).ready(function () {
    $('#firm').hide();
    $('#firm-label').hide();
  $("#company").on('change',function () {
    if($("#company").val() == 2) {
        $('#firm').show();
        $('#firm-label').show();
    } else {
        $('#firm').hide();
        $('#firm-label').hide();    
    }
  });
});
// Ajax request for postalCode
$(function () {
    $('#postalCode').keyup(function () {
        // if ($('#zipCode').val().length >= 3)
        $.post('../../controllers/registerCtl.php', {
            postalCodeSearch: $('#postalCode').val()
        }, function (cityName) {
            $("#city").empty();
            $.each(cityName, function(cityKey, cityValue){
                $("#city").append('<option value="' + cityValue.id + '">' + cityValue.postalCode + " " + cityValue.cityName + " " + '</option >')
                });
        }, 'JSON');
    });
});
// 

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
$(function () {
    $(window).bind("load resize", function () {
        var topOffset = 50;
        var width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        var height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    // var element = $('ul.nav a').filter(function() {
    //     return this.href == url;
    // }).addClass('active').parent().parent().addClass('in').parent();
    var element = $('ul.nav a').filter(function () {
        return this.href == url;
    }).addClass('active').parent();

    while (true) {
        if (element.is('li')) {
            element = element.parent().addClass('in').parent();
        } else {
            break;
        }
    }
});
// $(".deactivation").prop('disabled', true);
// $("#modify").removeAttr('disabled');
// $(".save").prop('disabled', true);

$(function () {
    $(document).scroll(function () {
        var $nav = $(".navbar-fixed-top");
        $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    });
});