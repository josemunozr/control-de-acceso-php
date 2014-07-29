$(document).ready(function(){


    $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '&#x3c;Ant',
        nextText: 'Sig&#x3e;',
        currentText: 'Hoy',
        monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
            'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
            'Jul','Ago','Sep','Oct','Nov','Dic'],
        dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
        dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
        weekHeader: 'Sm',
        dateFormat: 'yy/mm/dd',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''};

    $.datepicker.setDefaults($.datepicker.regional['es']);


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

    var cantInput = 2;
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
        cantInput = 2;

	});

}

function addUser(){

	$('.bottomAdd').click(function(e){
		e.preventDefault();
            cantInput++;

		var input = $('.item_addInput').last();

		var cloneInput = input.clone(true);
		
		var asd = $('.item_inputVisitantes').append(cloneInput);


		$('.item_addInput').last().addClass("clone");
        $('.item_addInput .nombreUsuario').last().attr("name","nombreUsuario"+ (cantInput));
        $('.item_addInput .apellidoUsuario').last().attr("name","apellidoUsuario"+ (cantInput));
        $('.item_addInput .rutUsuario').last().attr("name","rutUsuario"+ (cantInput));
        $('#cantInput').attr("value",cantInput);



		$('.content').css("height", "+=70%");

	});
}

function validacionRut(){
		
		// validacion rut AccesRequest
	$('.item_inputVisitantes .rutUsuario')
	.Rut({
		format_on: 'keyup'
	});
		// validacion rut otherMethod
	$('.item_rutUsuario #rutUsuario')
	.Rut({
		format_on: 'keyup'
	});
		// format Rut Company
	/*$('.item_rutEmpresa #rutEmpresa')
	.Rut({
		//format_on: 'keyup'
	});
*/
    $('.modified_rutUsuario #rutUsuario')
     .Rut({
            format_on: 'keyup'
     });

}

function displayItem(){
    var type = $(this).val();

    if(type == "Rut")
    {
        $(".item_NomAppe").css({ display: "none"});
        $(".modified_rutUsuario").css({ display: "block"});
        $("#tipoModificacion").attr("value","rut");

    }else if(type == "NomApe")
    {

       $(".modified_rutUsuario").css({ display: "none"});
       $(".item_NomAppe").css({ display: "block"});
       $("#tipoModificacion").attr("value","NomApe");


    }else if(type == "")
    {
      $(".modified_rutUsuario").css({ display: "none"});
      $(".item_NomAppe").css({ display: "none"});
     $("#tipoModificacion").attr("value","");

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