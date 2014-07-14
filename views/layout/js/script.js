$(document).ready(function(){

function dropdown(){

	$('ul li:has(ul)').hover(

		function(e){
			$(this).find('ul').css({ display: "block"});
			//$('.nav_guardia').css("width", "200px");
		},
		function(e){
			$(this).find('ul').css({ display: "none"});
			//$('.nav_guardia').css("width", "100px");
		}
	);
	
}

function clearInput(){

	$('.clearForm').click(function(e){
		e.preventDefault();

		// clear input Compay
		$('#empresa').val("");
		$('#rutEmpresa').val("");
		$('#date').val("");
		$('#motivoVisita').val("");
		$('#time').val("");
		// clear input User
		$('.item_inputVisitantes input').val("");
		
		// clear input Clone
		$('.clone').remove();

		$('.content').css("height", "140%");

	});

}

function addUser(){

	$('.bottomAdd').click(function(e){
		e.preventDefault();
		
		var input = $('.item_addInput').last();

		var cloneInput = input.clone(true);
		
		$('.item_inputVisitantes').append(cloneInput)

		$('.item_addInput').last().addClass("clone");

		$('.content').css("height", "+=70%");

	});
}

function validacionRut(){
		
		// validacion rut AccesRequest
	$('.item_inputVisitantes #rutUsuario')
	.Rut({
		format_on: 'keyup',
		on_error: function(){
			alert("rut Invalido");
		}
	});
		// validacion rut otherMethod
	$('.item_rutUsuario #rutUsuario')
	.Rut({
		format_on: 'keyup',
		on_error: function(){
			alert("rut Invalido");
		}
	});
		// format Rut Company
	$('.item_rutEmpresa #rutEmpresa')
	.Rut({
		format_on: 'keyup'
	});

    $('.modified_rutUsuario #rutUsuario')
     .Rut({
            format_on: 'keyup',
            on_error: function(){
                alert("rut Invalido");
            }
     });

}



function displayItem(){
    var type = $(this).val();

    if(type == "Rut")
    {
        $(".item_NomAppe").css({ display: "none"});
        $(".modified_rutUsuario").css({ display: "block"});

    }else if(type == "NomApe")
    {

       $(".modified_rutUsuario").css({ display: "none"});
       $(".item_NomAppe").css({ display: "block"});


    }else if(type == "")
    {
      $(".modified_rutUsuario").css({ display: "none"});
      $(".item_NomAppe").css({ display: "none"});

    }

}

    function activateMenu(e)
    {
       links.removeClass("active");
        var elementActive = $(this);
        elementActive.addClass('active');
        //e.preventDefault();
    }



    $('.item_calendar').datepicker();
    $('.dateInicio').datepicker();
    $('.dateFin').datepicker();
    $('.dateDesde').datepicker();
    $('.dateHasta').datepicker();
    $('.diaVisita').datepicker();
    $('#reportDesde').datepicker();
    $('#reportHasta').datepicker();
    $('#calendarVisits').datepicker();







$("#select_modifiedType").on("click",displayItem);
$("#buttonVisits").on("click", function(e){
    
    $("#linkStylePerfil").attr("href","http://localhost/dcaccesscontrol_php/views/layout/css/stylePerfil2.css" );
});

    links = $("nav").find("a");
    links.on("click", activateMenu);

	dropdown();
	clearInput();
	addUser();
    validacionRut();



});