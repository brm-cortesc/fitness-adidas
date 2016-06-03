var btnColor = $('.color'),
	btnTalla = $('.talla'),
	camiseta = $('#camiseta'),
	selectCamiseta = $('#selector-camiseta'),
	animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
	input = $('input.form-control'),
	isSafari = /constructor/i.test(window.HTMLElement),
	screenWidth = $(window).width();
	idCamiseta = selectCamiseta.val();
	

jQuery(document).ready(function($) {

	/*validamos tipo de navegador*/


	/*Validacion de campos de formulario*/
	$("#registro").validate({

		       // debug: true,

		      /*Contenedor y clase donde se pinta el error*/
		      errorElement: "div",
		      errorClass: "mensaje-sistema",

		      /*Campos para validar en form para pedir fiesta*/

		    rules: {
		           multi1:          {required: true},  
		           multi2:          {required: true},  
		           multi3:          {required: true},  
		           nombres:       {required: true, accept: "[a-zA-Z]+" },
		           apellidos:       {required: true, accept: "[a-zA-Z]+" },
		           email:       {required: true, email: true},  
		           telefono:          {required: true, digits: true},  
		           genero:        {required: true},
		           departamento:        {required: true},
		           ciudad:        {required: true},
		           tipodoc:          {required: true},  
		           documento:          {required: true, digits: true},  
		           nacimiento:          {required: true},  
		           autorizo:        {required: true},
		           terminos:        {required: true},
		           },

		    /*Mensajes en caso de dar error para cada input*/

		    messages: {
		      multi1:      {required: "debes ingresar el número de lote"},
		      multi2:      {required: "debes ingresar el número de lote"},
		      multi3:      {required: "debes ingresar el número de lote"},
		      nombres:      {required: "debes ingresar tu nombre", accept: "solo ingresa texto"},
		      apellidos:      {required: "debes ingresar tus apellidos", accept: "solo ingresa texto"},
		      email:      {required: "debes ingresar un email", email: "Ingresa un email válido"},
		      telefono:  {required: "Indíca un número de teléfono", digits: "solo se aceptan números" },
		      genero:         {required: "Indica un género"},
		      departamento:         {required: "debes seleccionarndica un departamento"},
		      ciudad:      {required: "debes seleccionar la ciudad"},
		      tipodoc:  {required: "Indíca el tipo de documento" },
		      documento:  {required: "Indíca un número de documento", digits: "solo se aceptan números" },
		      nacimiento:         {required: "Debes indicar tu fecha de nacimiento"},
		      autorizo:         {required: "Debes aceptar la política de datos"},
		      terminos:         {required: "Debes aceptar los términos y condiciones de la actividad"}
		     

		           },

		    errorPlacement: function (error, element) {

		      if( element.attr('name') == 'terminos' || element.attr('name') == 'autorizo'){

		        error.insertAfter(element.parent());

		      }else{

		        error.insertAfter(element);
		      }

		    }


		});


	


	/*cambio de camiseta*/
	/*set default de camiseta*/
	// camiseta.attr('src', 'images/camisetas/'+idCamiseta+'.png?w=340&amp;ch=DPR&amp;dpr=1');
	
	// camiseta.attr('data-zoom', 'images/camisetas/'+idCamiseta+'.png?w=1000&amp;ch=DPR&amp;dpr=1');

	selectCamiseta.change(function() {

		var color = $(this).find(':selected').attr('data-color');

		idCamiseta = $(this).val();

		camiseta.addClass('animated zoomOut');


		camiseta.one(animationEnd, function () {
			
			$(this).removeClass('zoomOut');
			camiseta.attr('src', 'images/camisetas/'+idCamiseta+'.png?w=340&amp;ch=DPR&amp;dpr=1');
			camiseta.attr('data-zoom', 'images/camisetas/'+idCamiseta+'.png?w=1000&ch=DPR&dpr=2');
			camiseta.addClass('animated zoomIn');

		} );



	});

	/*animacion label formulario*/
	input.focus( function() {

		$(this).parent().addClass('active');


	});

	input.focusout(function() {
		$(this).parent().removeClass('active');

		if ( $(this).val() != '' ){

		$(this).parent().addClass('active');
			
		}

	});


	


		/*funcion de zoom*/

		if ( screenWidth > 768 ) {
			setTimeout(function() {
				new Drift(document.querySelector('#camiseta'), {
				  paneContainer: document.querySelector('.detalle-camiseta'),
					 inlinePane: true,
					  containInline: true,
					  zoomFactor: 3
				});


			}, 1000);

		};

		if(isSafari){

		$('#camiseta').mouseleave(function() {
			$('.drift-zoom-pane').remove();
		});
	}


});

/*boton de talla activo*/

$(document).on('click', '.color', function(event) {
	
	event.preventDefault();
	var seleColor =$('img', this).attr('src');

	$('.color').removeClass('color-active');

	$(this).addClass('color-active');


	camiseta.attr('src', seleColor);
	camiseta.attr('data-zoom', seleColor+'?w=1000&ch=DPR&dpr=2');

	//console.log('color');



});

/*boton de talla activo*/


$(document).on('click', '.talla', function(event) {

	event.preventDefault();

	//console.log('talla');

	$('.talla').removeClass('talla-active');

	$(this).addClass('talla-active');

});




