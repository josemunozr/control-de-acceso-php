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



    $('.nav_guardia .calendar').datepicker();
    $('.inicioFin .calendar').datepicker();
    $('#reportDesde .calendar').datepicker();
    $('#reportHasta .calendar').datepicker();
    $('.item_calendar .calendar').datepicker();
    $('.diaVisita .calendar').datepicker();


$("#select_modifiedType").on("click",displayItem);



	dropdown();
	clearInput();
	addUser();
    validacionRut();

});