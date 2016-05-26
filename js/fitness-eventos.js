/*Eventos camiseta*/
jQuery(document).ready(function(){
	/*Ciudades*/
	jQuery('#departamento').on('change',function() {
   //console.log('Hola soy un select');
   jQuery('#ciudad').attr('disabled');
   jQuery('#ciudad').empty().append('<option value="">Ciudad/Municipio	</option>');
   var idDepto=jQuery('#departamento').val();
		 /*Inicia ajax*/
		 jQuery.ajax({
	    url: 'eventos.php',
		dataType:'json' ,
		type: 'POST',
		data: {
			idDepto:idDepto,
			vrtCrt:'ciudad'
		},
		success: function (data){
			var conteo=jQuery(data).length;
			console.log(conteo);
			jQuery('#ciudad').removeAttr('disabled');
			for (var i =0; i<conteo; i++ ) {
				console.log(data[i]);
				jQuery('#ciudad').append('<option value="'+data[i].idCiudad+'">'+data[i].nombre+'</option>')
			}
			 
			
		}

	});
	return false;
		 /*Finaliza */
});
});