$(document).on("ready", function(){

    $("#remember_pass").on("click", function(e){

        $("#form").css({ 'display' : 'none'});
        $("#remember_pass").css({ 'display' : 'none'});

       $("#formRememberPass").css({ 'display' : 'inline-block'});
       $("#atras").css({ 'display' : 'block'});

        e.preventDefault();

    });

    $("#atras").on("click", function(e){

        $("#formRememberPass").css({ 'display' : 'none'});
        $("#form").css({ 'display' : 'inline-block'});

        $("#atras").css({ 'display' : 'none'});
        $("#remember_pass").css({ 'display' : 'block'});

        e.preventDefault();

    });

    $(".rut").Rut({
        format_on: 'keyup'
    });

});