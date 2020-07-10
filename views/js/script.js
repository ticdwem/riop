function animationHover(element, animation){
    element = $(element);
    element.hover(
        function() {
            element.addClass('animated ' + animation);
        },
        function(){
            //wait for animation to finish before removing classes
            window.setTimeout( function(){
                element.removeClass('animated ' + animation);
            }, 2000);
        });
}
$(document).ready(function(){
    $('#animacion').each(function() {
        animationHover(this, 'bounce');
    });
		$('#animacion1').each(function() {
				animationHover(this, 'bounce');
		});
		$('#animacion2').each(function() {
				animationHover(this, 'bounce');
		});
		$('#animacion3').each(function() {
				animationHover(this, 'bounce');
		});
		$('#animacion5').each(function() {
				animationHover(this, 'flipInX');
		});
		$('#animacion6').each(function() {
				animationHover(this, 'flipInX');
		});
		$('#animacion7').each(function() {
				animationHover(this, 'flipInX');
		});
		$('#animacion8').each(function() {
				animationHover(this, 'bounceIn');
		});
		$('#animacion9').each(function() {
				animationHover(this, 'tada');
		});
		$('#animacion10').each(function() {
				animationHover(this, 'tada');
		});
		$('#animacion11').each(function() {
				animationHover(this, 'tada');
		});
		$('#animacion12').each(function() {
				animationHover(this, 'bounceInUp');
		});
		$('#animacion13').each(function () {
			animationHover(this, 'tada');
		});
		$('#animacion14').each(function () {
			animationHover(this, 'tada');
		});



// check if a checkbox where cliked
	$("#Dvlinea input[name='lineaPr']").on("click",function(){
	// $("body").on("click","#Dvlinea input[name='lineaPr']",function(){
		var valorRb = $(this).val();
		var netTabla = "sublinea";
		var linTabla = "linea";
		var enviarDatos= [];
		var radio='';
		enviarDatos.push({'tabla':netTabla,'tabla2':linTabla,'valorrb':valorRb});
			var datos = {"datosS":enviarDatos};
			var valorDatos = JSON.stringify(datos);

		$.ajax({
			method:"POST",
			url: "views/modules/ajax.php",
			data:{"valor":valorDatos},
			cache:false,
			/*beforeSend:function(){
				document.getElementById("loguinLock").innerHTML='<div><img src="views/images/load.gif"  width="30px" height="30px" /></div>';
			},*/
			success:function(nextValue){
				console.log();
				if(nextValue != 0){
					$.each(nextValue,function (i,item) {
						// radio += '<div class="form-check col-lg-6"><input type="radio" name="subLineaRadio" class="form-check-input" value="'+item.idSubLn+'"><label class="form-check-label" for="exampleCheck1">'+item.nombre+'</label></div>';
						radio += '<div class="form-check col-lg-6"><input type="radio" name="subLineaRadio" class="form-check-input" value="'+item.nombre+'"><label class="form-check-label" for="exampleCheck1">'+item.nombre+'</label></div>';
					});
					$("#Sublinea").html(radio);
					$("#btnBuscarPreciso").css("display","block");
				}else{
					$("#Sublinea").html('<div class="form-check col-lg-6"><label class="form-check-label" for="exampleCheck1">!LO SIENTO NO TENGO INFORMACIÓN¡</label></div>');					
				}
			},
			error:function(jqXHR,estado,error){
				document.getElementById("Sublinea").innerHTML=error;
			},
			complete:function(jqXHR,estado){
			},
			timeout:10000
		});
	});

	$("#btnBuscarPreciso").on("click",function(e){
		e.preventDefault()
		var sublinea,url;
		var radioSublinea = $("#Sublinea input[name='subLineaRadio']:checked").val();
		var validarRdio = expRegular("nombre",radioSublinea);
		
		if($("#Sublinea input[name='subLineaRadio']:radio").is(":checked")){
			if(validarRdio !=0){
				sublinea = $("#Sublinea input[name='subLineaRadio']:checked").val();
				url = 'catalogo-productos?sublinea='+sublinea.toLowerCase();
				$(location).attr('href',url);
			}else{
				alert("verifica");
			}
		}else{alert("debes elegir una categoria");}

		
	})
});

/**************************mostrar password************************************/
$(document).ready(function(){
	$("#showPass").on("click",function(e){
		e.preventDefault();
		var showP = document.getElementById("passUser");

		if(showP.type == "password"){
			showP.type = "text";
			$(".icon").removeClass('fas fa-eye-slash fa-3x').addClass('far fa-eye fa-3x');
		}else{
			showP.type = "password";
			$(".icon").removeClass('far fa-eye fa-3x').addClass('fas fa-eye-slash fa-3x');
		}
	});

/**************************añadir carrito************************************/
	$("#btnAddCart").on("click",function(e){
		e.preventDefault();
		var idProducto = $("#codProdUnico").html();
		var validarProdId = expRegular("nombre",idProducto);

		if (validarProdId != 0){
			$.ajax({
				
				url: "../views/modules/ajax.php",
				method:"POST",
				data:{"idProducto":idProducto},
				cache:false,
				beforeSend:function(){
					$('.spinnerWhite').html('<i class="fas fa-sync fa-spin"></i>');
				},
				success:function(artUno){
					if(artUno == 1){
						Swal.fire({
						  position: 'top-end',
						  icon: 'success',
						  title: 'SE HA AGREGADO AL CATALOGO',
						  showConfirmButton: false,
						  timer: 9500
						})

						 window.history.back();
					}else if(artUno == 0){
						Swal.fire(
						  'ERROR',
						  'INTENTE MAS TARDE NO ES UN ARRAY',
						  'warning'
						)
					}else if(artUno == 2){
						alert("no sumo");
					}else if(artUno == 3){
						Swal.fire({
						  title: 'ERROR',
						  text: "TU CARRITO ESTA LLENO",
						  icon: 'warning',
						  showCancelButton: false,
						  confirmButtonColor: '#3085d6',
						  cancelButtonColor: '#d33',
						  confirmButtonText: 'ACEPTAR'
						}).then((result) => {
						  if (result.value) {
						   
						    window.location.href = "http://192.168.1.69/final-catalogo/catalogo";
						  }
						})
					}else if(artUno == 4){
						Swal.fire({
						  title: 'ERROR',
						  text: "ESTE PRODUCTO YA ESTA EN TU CARRITO",
						  icon: 'warning',
						  showCancelButton: false,
						  confirmButtonColor: '#3085d6',
						  cancelButtonColor: '#d33',
						  confirmButtonText: 'ACEPTAR'
						}).then((result) => {
						  if (result.value) {
						    window.location.href = "http://192.168.1.69/final-catalogo/catalogo";
						  }
						})
					}
				}
			});

		}
	});
/**********************************ELIMINAR DEL CARRITO********************************************************/
$("body").on('click','.table .deletePr',function(e){
	e.preventDefault();

	idPRoducto = $(this).attr('data-id');

	var producto = new FormData();
	producto.append("idPRoducto",idPRoducto);

	Swal.fire({
	  title: 'ELIMINAR',
	  text: "DESEA ELIMINAR ESTE ARTÍCULO DEL CATÁLOGO",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'SI,ELIMINAR'
	}).then((result) => {
	  if (result.value) {
	  	$.ajax({
			url: "views/modules/ajax.php",
			method:"POST",
			data:producto,
			cache:false,
			contentType:false,
			processData:false,
			beforeSend:function(){
			$('.spinnerWhite').html('<i class="fas fa-sync fa-spin"></i>');
					},
			success:function(dato){
				$("#catlist").empty();
       			$("#catlist").load(location.href + " #catlist", "");
				$("#circulo").empty();
       			$("#circulo").load(location.href + " #circulo", "");			
			
			 }
		})
	    Swal.fire(
	      'Deleted!',
	      'Your file has been deleted.',
	      'success'
	    )
	  }
	})
	
});
/**********************************sumar y restar Carrito********************************************************/
$("body").on('click','.table .plus',function(e){
	e.preventDefault();

	idPRoducto = $(this).attr('data-id');

	var producto = new FormData();
	producto.append("sumarPr",idPRoducto);
	  
	  	$.ajax({
			url: "views/modules/ajax.php",
			method:"POST",
			data:producto,
			cache:false,
			contentType:false,
			processData:false,
			beforeSend:function(){
			$('.spinnerWhite').html('<i class="fas fa-sync fa-spin"></i>');
					},
			success:function(dato){

				console.log(dato);
					$("#catlist").empty();
       			$("#catlist").load(location.href + " #catlist>", "");
       			$("#circulo").empty();
       			$("#circulo").load(location.href + " #circulo>", "");	
			
			 }
		});

});

$("body").on('click','.table .rest',function(e){
	e.preventDefault();

	idPRoducto = $(this).attr('data-id');

	var producto = new FormData();
	producto.append("restarPr",idPRoducto);
	  
	  	$.ajax({
			url: "views/modules/ajax.php",
			method:"POST",
			data:producto,
			cache:false,
			contentType:false,
			processData:false,
			beforeSend:function(){
			$('.spinnerWhite').html('<i class="fas fa-sync fa-spin"></i>');
					},
			success:function(dato){

				console.log(dato);
					$("#catlist").empty();
       			$("#catlist").load(location.href + " #catlist>", "");
       			$("#circulo").empty();
       			$("#circulo").load(location.href + " #circulo>", "");	
			
			 }
		});

});
/**********************************VACIAR CARRITO********************************************************/
$("#vaciar").on("click",function(e){
	e.preventDefault();
	var varciar =$("#vaciar").attr('data-id');
	
	var clean = new FormData();
	clean.append("emoryy",varciar);

	Swal.fire({
	  title: 'ELIMINAR EL CATÁLOGO',
	  text: "DESEA VACIAR EL CATÁLOGO",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'SI,ELIMINAR'
	}).then((result) => {
	  if (result.value) {
	  	$.ajax({
			url: "views/modules/ajax.php",
			method:"POST",
			data:clean,
			cache:false,
			contentType:false,
			processData:false,
			beforeSend:function(){
			$('.spinnerWhite').html('<i class="fas fa-sync fa-spin"></i>');
					},
			success:function(dato){
				$("#catlist").empty();
       			$("#catlist").load(location.href + " #catlist>", "");
				$("#circulo").empty();
       			$("#circulo").load(location.href + " #circulo>", "");			
			
			 }
		})
	    Swal.fire(
	      'VACIO!',
	      'SU CATALOGO ESTA VACIO SELECCIONE AL MENOS UN ARTÍCULO',
	      'success'
	    )
	  }
	})
});

/**********************************enviar checkbox******************************************************/
 $("#sendCheckbox").on("click", function(e){
 	e.preventDefault();

 	var genera = new Array();
 	var checks;
 	var query = $('#get').val();
 	var option = $('select[name=datos]').val();

 	$('input[type=checkbox]:checked').each(function(){
 		genera.push($(this).val());
 	});
 		genera.push({"tabla":query,"id":option});

 	if(genera.length == 1){
 		Swal.fire({
		  icon: 'error',
		  title: 'ERROR...',
		  text: 'DEBES SELECCIONAR AL MENOS UNA FILA',
		  footer: 'SELECCIONAR UNA FILA PARA DESCARGAR EL ARCHIVO'
		});
 	}else{
 		checks = {"chek":JSON.stringify(genera)};
 		window.open('../helpers/excel.php?dtos='+JSON.stringify(genera));
 	}

 });
/****************************enviar correo******************************************/

 $("#print").on("click", function(){
 	$(".emailError").html('<span class="spinner-grow text-primary "></span>');
 	$(".emailMensaje").html('NO REFRESQUES LA PAGINA O PRESIONES UN BOTON, EL PROCESO PUEDE TARDAR');
 	var name,mailE;
 	//window.open('generatePdf/micatalogo.php');
 	var nombre = empty($("#Inputname").val());
 	var correo = empty($("#inputEmail").val());
 	

 	var contador = false;
 	if(nombre != 1){
 		var verNom = expRegular("nombre",$("#Inputname").val());
 		if(verNom!=0){
 			contador = true;
 			$("#Inputname").addClass("is-valid");
 			name = $("#Inputname").val();
 		}else{
 			contador = false;
 			$("#Inputname").addClass("is-invalid");
 			$(".nameError").css("color","red");
	 		$(".nameError").html("ingresa un nombre valido");
 		}
 	}else{
 		contador = false;
 		$("#Inputname").addClass("is-invalid");
 	}
 	if(correo != 1){
 		 var email = expRegular("email",$("#inputEmail").val());
 		if(email != 0){
	 		contador = true;
	 		//$("#print").attr("disabled", true);
	 		$("#inputEmail").addClass("is-valid");	 		
			
	 		mailE = $("#inputEmail").val();
 		}else{ 	
 			contador = false;		
 			$("#inputEmail").addClass("is-invalid");
	 		$(".emailError").css("color","red");
	 		$(".emailError").html("ingresa un correo valido");
 		}
 	}else{
 		contador = false;
 		$("#inputEmail").addClass("is-invalid");
 	}

 	if(contador == false){
 		$(".emailError").html("LOS DATOS SON INCORRECTOS");
 		return false;
 	}
 });
 /****************************cancelar modal******************************************/
 $("#cancel").on("click",function(e){
 	e.preventDefault();
 	var nombre = empty($("#Inputname").val(""));
 	var correo = empty($("#inputEmail").val(""));
	$("#Inputname").addClass("is-invalid");
 	$("#inputEmail").addClass("is-invalid");
 	$("#Inputname").addClass("is-valid");
 	$("#inputEmail").addClass("is-valid");
 	$(".nameError").html("");
	$(".emailError").html("i");

 })

 /****************************login******************************************/
 $("#sigin").on("click",function(e){
 	e.preventDefault();
 	var datos = new Array();
 	var nombre = $(".user").val();
 	var pass = $(".pass").val();

 	var contador = false;
 	if(nombre != 1){
 		var verNom = expRegular("nombre",$(".user").val());
 		if(verNom!=0){
 			contador = true;
 			$(".user").addClass("is-valid");
 			name = $(".user").val();
 		}else{
 			contador = false;
 			$(".user").addClass("is-invalid");
 			// $(".nameError").css("color","red");
	 		// $(".nameError").html("ingresa un nombre valido");
 		}
 	}else{
 		contador = false;
 		$(".user").addClass("is-invalid");
 	}
 	if(pass != 1){
 		 var email = expRegular("email",$("#inputEmail").val());
 		if(email != 0){
	 		contador = true;
	 		//$("#print").attr("disabled", true);
	 		$("#inputEmail").addClass("is-valid");	 		
			
	 		mailE = $("#inputEmail").val();
 		}else{ 	
 			contador = false;		
 			$("#inputEmail").addClass("is-invalid");
	 		$(".emailError").css("color","red");
	 		$(".emailError").html("ingresa un correo valido");
 		}
 	}else{
 		contador = false;
 		$("#inputEmail").addClass("is-invalid");
 	}

 	if(contador == false){
 		$(".emailError").html("LOS DATOS SON INCORRECTOS");
 		return false;
 	}
 });
});
