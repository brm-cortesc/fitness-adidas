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
				//console.log(data.relacionadas);
				var camisetasR=data.relacionadas,
				codCamisetaR,
				conteoR=jQuery(camisetasR).length,
				cantidadXsR,
				cantidadSR,
				cantidadMR,
				canitdadLR,
				canitdadXlR;
				for (var i = 0; i < conteoR; i++) {
					//console.log(camisetasR[i]);
					codCamisetaR=camisetasR[i].articuloSerial.toLowerCase();
					cantidadXsR=camisetasR[i].cantidadXS;
					cantidadSR=camisetasR[i].cantidadS;
					cantidadMR=camisetasR[i].cantidadM;
					canitdadLR=camisetasR[i].cantidadL;
					canitdadXlR=camisetasR[i].cantidadXL;
					if(camisetasR[i].articuloSerial==camisetaSeleccionada){
						jQuery('.colores').append('<button type="button" class="color color-active" data-cantidadxs="'+cantidadXsR+'" data-cantidads="'+cantidadSR+'" data-cantidadm="'+cantidadMR+'" data-cantidadl="'+canitdadLR+'" data-cantidadxl="'+canitdadXlR+'"><img src="images/camisetas/'+codCamisetaR+'.png"></button>');
					}else{	
						jQuery('.colores').append('<button type="button" class="color" data-cantidadxs="'+cantidadXsR+'" data-cantidads="'+cantidadSR+'" data-cantidadm="'+cantidadMR+'" data-cantidadl="'+canitdadLR+'" data-cantidadxl="'+canitdadXlR+'"><img src="images/camisetas/'+codCamisetaR+'.png"></button>');
					}
             
				};

							 
				
			}
	
		});
	return false;
	});

	/*Valida códigos*/
	jQuery('#multi1').on('blur',function(){
		var multi1=jQuery(this).val();
		if(multi1!=''){
			jQuery('#multi2').removeAttr('disabled')
		}
	});
	jQuery('#multi2').on('blur',function(){
		var multi2=jQuery(this).val();
		if(multi2!=''){
			jQuery('#multi3').removeAttr('disabled')
		}
	});
	jQuery('#multi3').blur(function(){
		var cod1=jQuery('#multi1').val(),
		cod2=jQuery('#multi2').val(),
		cond3=jQuery('#multi3').val();
		//console.log(cod1);
		//console.log(cod2);
		//console.log(cond3);
		jQuery.ajax({
			 url: 'eventos.php',
			dataType:'json' ,
			type: 'POST',
			data: {
				codigo1:cod1,
				codigo2:cod2,
				codigo3:cond3,
				vrtCrt:'validacodigo'
			},
			success: function (data){
				console.log(data);
			}
		});
		return false;
	});


	/*Registro*/
	jQuery('#btn-registro').on('click',function(){
		
		if(jQuery('#registro').valid()){
			jQuery('#btn-redime').hide('fade');
			jQuery('#btn-registro').hide('fade');
			//console.log('es valido');
			var nombre=jQuery('#nombres').val(),
			apellido=jQuery('#apellidos').val(),
			email=jQuery('#email').val(),
			telefono=jQuery('#telefono').val(),
			genero=jQuery('#genero').val(),
			idDepto=jQuery('#departamento').val(),
			idCiudad=jQuery('#ciudad').val(),
			tipodoc=jQuery('#tipodoc').val(),
			documento=jQuery('#documento').val(),
			nacimiento=jQuery('#nacimiento').val(),
			iemail=jQuery('#iemail').val(),
			itelefono=jQuery('#itelefono').val(),
			autorizo=jQuery('#autorizo').val(),
			terminos=jQuery('#terminos').val();
			jQuery.ajax({
				url: 'eventos.php',
				dataType:'json' ,
				type: 'POST',
				data: {
					nombre:nombre,
					apellido:apellido,
					email:email,
					telefono:telefono,
					genero:genero,
					idDepto:idDepto,
					idCiudad:idCiudad,
					tipodoc:tipodoc,
					documento:documento,
					nacimiento:nacimiento,
					iemail:iemail,
					itelefono:itelefono,
					autorizo:autorizo,
					terminos:terminos,
					vrtCrt:'registrar'
				},
				success: function (data){
					//console.log(data);
					if(data=='exitoso'){
						jQuery('.exitoso').removeClass('hidden');
						
						jQuery('#btn-registro').show('fade');
					}
				}

			});
			return false;
		}
	});
	/*Valida cedula registrada*/
	jQuery('#documentoValidate').on('blur',function(){
		var prodCedula=jQuery('#documentoValidate').val();
		jQuery.ajax({
			 url: 'eventos.php',
			dataType:'json' ,
			type: 'POST',
			data: {
				prodCedula:prodCedula,
				vrtCrt:'cc'
			},
			success: function (data){
				//console.log(data);
				if(data!='existeC'){
					jQuery('.registrousu').show('fade');
					jQuery('#btn-redime').hide('fade');
				}else{
						jQuery('#btn-redime').show('fade');
						//jQuery('.registrousu').detach();
				}
			}
		});
	});

});