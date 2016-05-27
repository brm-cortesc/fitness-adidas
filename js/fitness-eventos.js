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
	/*Cambia camisetas*/
	jQuery('#selector-camiseta').on('change',function(){
		var codCamiseta=jQuery(this).val(),
		relacionadas=jQuery('option:selected').attr('data-cod'),
		camisetaSeleccionada=codCamiseta.toUpperCase();
		console.log(camisetaSeleccionada);
		jQuery('.tallas > button').detach();
		jQuery('.colores > button').detach();
		//console.log(codCamiseta);
		 /*Inicia ajax*/
			jQuery.ajax({
		    url: 'eventos.php',
			dataType:'json' ,
			type: 'POST',
			data: {
				codCamiseta:codCamiseta,
				relacionadas:relacionadas,
				vrtCrt:'camiseta'
			},
			success: function (data){
				//console.log(data);
				jQuery('.tallas').show();
				jQuery('.colores').show();
				var camisetasT=data.camisetas;
				var cuenta=jQuery(camisetasT).length;
				var cantidadXs=0,
				cantidadS=0,
				cantidadM=0,
				canitdadL=0,
				canitdadXl=0;
				//console.log(cuenta);
				//console.log(data);
				for (var i = 0; i < cuenta; i++) {
					cantidadXs=camisetasT[i].cantidadXS;
					cantidadS=camisetasT[i].cantidadS;
					cantidadM=camisetasT[i].cantidadM;
					canitdadL=camisetasT[i].cantidadL;
					canitdadXl=camisetasT[i].cantidadXL;
					if (cantidadXs>0){
						jQuery('.tallas').append('<button type="button" class="talla-active talla">xs</button>');
					}
					if (cantidadS>0){
						jQuery('.tallas').append('<button type="button" class="talla">s</button>');
					}
					if (cantidadM>0){
						jQuery('.tallas').append('<button type="button" class="talla">m</button>');
					}
					if (canitdadL>0){
						jQuery('.tallas').append('<button type="button" class="talla">l</button>');
					}
					if (canitdadXl>0){
						jQuery('.tallas').append(' <button type="button" class="talla">xl</button>');
					}

					
				};

				/*Colores camisetas*/
				console.log(data.relacionadas);
				var camisetasR=data.relacionadas,
				codCamisetaR,
				conteoR=jQuery(camisetasR).length;
				for (var i = 0; i < conteoR; i++) {
					console.log(camisetasR[i]);
					codCamisetaR=camisetasR[i].articuloSerial.toLowerCase();
					if(camisetasR[i].articuloSerial==camisetaSeleccionada){
						jQuery('.colores').append('<button type="button" class="color color-active"><img src="images/camisetas/'+codCamisetaR+'.png"></button>');
					}else{	
						jQuery('.colores').append('<button type="button" class="color"><img src="images/camisetas/'+codCamisetaR+'.png"></button>');
					}
					/*<button type="button" class="color color-active"><img src="images/camisetas/ak0077.png"></button>*/
             
				};

							 
				
			}
	
		});
	return false;
	});
});