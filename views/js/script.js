$(document).ready(function(){

	
console.log("todo ok");

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

		$('.content').css("height", "120%");

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

function colorNav(){

	$('nav ul li').hover(

		function(){
			$('nav ul li a').css("color","black");
		},
		function(){
			$('nav ul li a').css("color","white");	
		}
	);
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

}


$('.nav_guardia .calendar').datepicker();
$('.inicioFin .calendar').datepicker();
$('.desde_hasta .calendar').datepicker();
$('.item_calendar .calendar').datepicker();
$('.diaVisita .calendar').datepicker();



	dropdown();
	clearInput();
	addUser();
	colorNav();
	validacionRut();



});