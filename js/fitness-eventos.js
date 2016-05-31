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
		codCamisetaI=jQuery('#detalleCamiseta').val(camisetaSeleccionada);
		//console.log(camisetaSeleccionada);
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
						jQuery('.colores').append('<button type="button" data-cod="'+camisetasR[i].articuloSerial+'" class="color color-active" data-cantidadxs="'+cantidadXsR+'" data-cantidads="'+cantidadSR+'" data-cantidadm="'+cantidadMR+'" data-cantidadl="'+canitdadLR+'" data-cantidadxl="'+canitdadXlR+'"><img src="images/camisetas/'+codCamisetaR+'.png"></button>');
					}else{	
						jQuery('.colores').append('<button type="button"  data-cod="'+camisetasR[i].articuloSerial+'"class="color" data-cantidadxs="'+cantidadXsR+'" data-cantidads="'+cantidadSR+'" data-cantidadm="'+cantidadMR+'" data-cantidadl="'+canitdadLR+'" data-cantidadxl="'+canitdadXlR+'"><img src="images/camisetas/'+codCamisetaR+'.png"></button>');
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
				if(data!="codvalidos"){
					jQuery('.codnoValido').html('<p>Lo sentimos, los códigos ingresados no son válidos</p>').show('fade');
				}else{
					jQuery('.codnoValido').hide('fade');
				}
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
			terminos=jQuery('#terminos').val(),
			cod1=jQuery('#multi1').val(),
			cod2=jQuery('#multi2').val(),
			cod3=jQuery('#multi3').val(),
			codCamisetaRede=jQuery('#detalleCamiseta').val(),
			tallaSelec=jQuery('.talla-active').text();;			
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
					cod1:cod1,
					cod2:cod2,
					cod3:cod3,
					codCamisetaRede:codCamisetaRede,
					tallaSelec:tallaSelec,
					vrtCrt:'registrar'
				},
				success: function (data){
					//console.log(data);
					if(data=='exitoso'){

						jQuery('.exitoso').removeClass('hidden');
						jQuery('.clearI').val('');
						jQuery('.registrousu').hide('fade');
						jQuery('.multipacks').hide('fade');
						
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
					jQuery('.cedulaValid').hide('fade');
					jQuery('.registrousu').show('fade');
					jQuery('#validacedula').hide('fade');
					jQuery('#documento').val(prodCedula).parent().addClass('active');
					jQuery('#btn-redime').hide('fade');
				}else{
						jQuery('#btn-redime').show('fade');
						//jQuery('.registrousu').detach();
				}
			}
		});
	});

	/*Eventos cambio camiseta*/
	jQuery(document).on('click','.color',function(){
		//console.log('hola');
		var codCamiseta=jQuery(this).attr('data-cod'),
		cantidadXsS=jQuery(this).attr('data-cantidadxs'),
		cantidadSS=jQuery(this).attr('data-cantidads'),
		cantidadMS=jQuery(this).attr('data-cantidadm'),
		cantidadLS=jQuery(this).attr('data-cantidadl'),
		cantidadXLS=jQuery(this).attr('data-cantidadxl');
		jQuery('#detalleCamiseta').val(codCamiseta)
		jQuery('.tallas > button').detach();
		if (cantidadXsS>0){
			jQuery('.tallas').append('<button type="button" class="talla-active talla">xs</button>');
		}
		if (cantidadSS>0){
			jQuery('.tallas').append('<button type="button" class="talla">s</button>');
		}
		if (cantidadMS>0){
			jQuery('.tallas').append('<button type="button" class="talla">m</button>');
		}
		if (cantidadLS>0){
			jQuery('.tallas').append('<button type="button" class="talla">l</button>');
		}
		if (cantidadXLS>0){
			jQuery('.tallas').append(' <button type="button" class="talla">xl</button>');
		}
		
	})
	/*Redime camisetaSeleccionada*/

	jQuery('#btn-redime').on('click',function(){
		var codCamisetaRede=jQuery('#detalleCamiseta').val(),
		prodCedula=jQuery('#documentoValidate').val();
		tallaSelec=jQuery('.talla-active').text();
		var cod1=jQuery('#multi1').val(),
		cod2=jQuery('#multi2').val(),
		cod3=jQuery('#multi3').val();
		if(jQuery(codCamisetaRede)!=''){
			jQuery.ajax({
			url: 'eventos.php',
			dataType:'json' ,
			type: 'POST',
			data: {
				codCamisetaRede:codCamisetaRede,
				prodCedula:prodCedula,
				tallaSelec:tallaSelec,
				cod1:cod1,
				cod2:cod2,
				cod3:cod3,

				vrtCrt:'redime'
			},
			success: function (data){
				console.log(data);
				if(data=='maximo'){
					//console.log('hola');
					jQuery('.codnoValido').html('<p>Solo se permiten dos camisetas por usuario</p>').show('fade');
					jQuery('#btn-redime').hide('fade');
				}else if(data=='existeC'){
					jQuery('#btn-redime').show('fade');
					
				}else if(data=='redime'){
					jQuery('.codnoValido').html('<p>Redimiste tu segunda prenda</p>').show('fade');
				}else if(data=='vacio'){
					jQuery('.codnoValido').html('<p>Debes ingresar un número de cédula</p>').show('fade');
				}else if(data=='nocamiseta'){
					jQuery('.codnoValido').html('<p>Selecciona una prenda</p>').show('fade');
				}else if(data=='novienecod'){
					jQuery('.codnoValido').html('<p>Debes ingresar los tres códigos</p>').show('fade');
				}else{
					jQuery('.registrousu').show('fade');
					jQuery('#btn-redime').hide('fade');
				}
				return false;
			}
		});
		
		}else{
			jQuery('.codnoValido').html('<p>Selecciona una camiseta</p>').show('fade');
		}
		return false;
	});
	
});