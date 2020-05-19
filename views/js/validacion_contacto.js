/*verifiacar los datos de envio de correo*/
$("#btnEnviarCorreo").on("click",function(e){
	e.preventDefault();
	var nombreMail,correoMail,correoPhone,mensajeMail,dirMail;
	var nombre = empty($("#nombre").val());
	var phone = empty($("#telefono").val());
	var email = empty($("#correo").val());
	var dir = empty($("#dir").val());
	var messagge = empty($("#mess").val());

	var sendEmail = [];

	if(nombre != 1){
		var verNom = expRegular("nombre",$("#nombre").val());
		if(verNom !=0){
			$("#nombre").css("border","2px solid #5EE25E");
			nombreMail = $("#nombre").val();
		}else{
			$("#nombre").css("border","2px solid #DA3030");
			$(".errorNombre").html("HAY ERR00099ORES EN ESTE CAMPO");
			nombreMail =-2;
		}
		
	}else{
		$(".errorNombre").css("display","block");
		return false;
	}

	if(phone != 1){
		var verPhone = expRegular("phone",$("#telefono").val());
		if (verPhone!=0) {
			$("#telefono").css("border","2px solid #5EE25E")
			correoPhone = $("#telefono").val();
		}else{
			$("#telefono").css("border","2px solid #DA3030");
			correoPhone =-2;
		}
	}else{
		$(".errorTel").css("display","block");
		return false;
	}

	if(email != 1){
		var veremail = expRegular("email",$("#correo").val());
		if (veremail!=0) {
			$("#correo").css("border","2px solid #5EE25E")
			correoMail = $("#correo").val();
		}else{
			$("#correo").css("border","2px solid #DA3030");
			correoMail =-2;
		}
		
	}else{
		$(".errorCorreo").css("display","block");
		return false;
	}

	if(dir != 1){
		var verdir = expRegular("dir",$("#dir").val());
		if (verdir!=0) {
			$("#dir").css("border","2px solid #5EE25E");
			dirMail =$("#dir").val();
		}else{
			$("#dir").css("border","2px solid #DA3030");
			dirMail =-2;
		}
		
	}else{
		$(".errorDir").css("display","block");
		return false;
	}

	if(messagge != 1){
		var vermess = expRegular("messagge",$("#mess").val());
		if (vermess!=0) {
			$("#mess").css("border","2px solid #5EE25E");
			mensajeMail =$("#mess").val();
		}else{
			$("#mess").css("border","2px solid #DA3030");
			mensajeMail =-2;
		}
		
	}else{
		$(".errorMensaje").css("display","block");
		return false;
	}


	if(nombreMail != -2 && correoMail != -2 && correoPhone != -2 && mensajeMail != -2){
		
			sendEmail.push({'nombre':nombreMail,'telefono':correoPhone,'correo':correoMail,'direccion':dirMail,'mensajeMail':mensajeMail});
			var sub = {"datosS":sendEmail};
			var emailMesssaje = JSON.stringify(sub);
			$.ajax({
				url: "views/modules/ajax.php",
				method:"POST",
				data:{"correoHaciaAjax":emailMesssaje},
				cache:false,
				beforeSend:function(){
					$('#errorEmail').css('display','block');
					$('#errorEmail').html('<img src="views/images/ajax-loader.gif" alt="loading" />');
				},
				success:function(artUno){
					console.log(artUno);
					if(artUno){
						alert("enviado");
						window.location.href = "inicio";
					}else{
						alert("Hubo un error porfavor intente mas tarde");
					}
				}
			});
	}else{
		$("#errorEmail").html("HAY ERRORES,ARREGLALOS ANTES DE ENVIAR");
		return false;
	}
return false;
});

/*$("#btn_buscar").on("click",function(){*/
$("#frmFormSerarching").submit(function(){
			var verifTexto;
			var datosReales;
			var Texto = empty($("#buscarInput").val());
			if(Texto == 1){
				$("#buscarInput").css('border','1px solid red');
				$(".errorInput").css('display','block');
				$(".errorInput").css('color','red');
				$(".errorInput").html("INGRESA UNA PALABRA PARA HACER LA BUSQUEDA");
				return false;
			}else{
				verifTexto = expRegular("messagge",$("#buscarInput").val());
				if(verifTexto != 0){
					$("#buscarInput").css('border','1px solid green');
					$(".errorInput").css('display','none');		
					return true;	
				}else{
					$("#buscarInput").css('border','1px solid red');
					$(".errorInput").css('display','block');
					$(".errorInput").css('color','red');
					$(".errorInput").html("VERIFICA LA O LAS PALABRAS TIENES UN ERROR");
					return false
				}
			}
			});
		/*});*/


function empty(data){
	var datos = data.length;
	if(datos>0){
		return datos;
	}else{
		return 1;
	}
}

function expRegular(texto,contenido){

	var letras_latinas;
	var ercorreo;
	var phonearray;   
	var mesaje;
	var varif;  
	switch (texto) {
	  case "nombre":
	   letras_latinas = /^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/;
	   varif = letras_latinas;
	    break;
	  case "email":
	   ercorreo=/^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+$/;
	   varif = ercorreo;
	    break;
	  case "phone":
	   phonearray = /^[0-9]+$/;
	   varif =   phonearray;
	    break; 
	  case "messagge":
	  case "dir":
	   mesaje = /^[0-9a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_;,.()¿$?\s]+$/;
	   varif= mesaje; 
	    break;
	}
	if (!(varif.test(contenido))) {
			 return 0;
		}else{
			 return texto;
		}

}

