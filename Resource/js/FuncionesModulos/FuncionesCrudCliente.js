function valida(e){
	tecla = (document.all) ? e.keyCode : e.which;

	// Patron de entrada, en este caso solo acepta numeros
	patron =/[0-9]/;
	tecla_final = String.fromCharCode(tecla);

	if(patron.test(tecla_final)<=0){

		 swal("Advertencia!", "No se permiten letras en este campo!", "warning");

	}
	return patron.test(tecla_final);
}

 function soloLetras(e){
   key = e.keyCode || e.which;
   tecla = String.fromCharCode(key).toLowerCase();
   letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
   especiales = "8-13-37-39-46";
   tecla_especial = false

   for(var i in especiales){
        if(key == especiales[i]){

            tecla_especial = true;

            break;
        }

    }

    if(letras.indexOf(tecla)==-1 && !tecla_especial){
    	  swal("Advertencia!", "No se permiten numeros en este campo!", "warning");
        return false;
    }
 }

 $(document).ready(function(){
	$(".boton1").click(function(){
	     var valor = [];
	     var i=0;
	     // Obtenemos todos los valores contenidos en los <td> de la fila
	    // seleccionada
	    $(this).parents("tr").find("td").each(function(){
	        //valores+=$(this).html()+"\n";
	        valor[i]=$(this).html();
	        i++;
	    });
	   // for(var a=0;a<=2;a++){
	    // alert( valor[a]);
	    //}
	     $("#modal_idcliente").val(valor[0]);
	     $("#modal_nombre").val(valor[1]);
	     $("#modal_documento").val(valor[2]);	     
	     $("#modal_telefono").val(valor[5]);
	     $("#modal_barrio").val(valor[4]);	    
	     $("#modal_correo").val(valor[6]); 
	     $("#DocumentoActual").val(valor[2]); 
	     $("#modal_prueba").val(valor[3]);           
	     
	});
});

$(document).ready(function(){
	$(".boton2").click(function(){
	     var valor = [];
	     var i=0;
	     // Obtenemos todos los valores contenidos en los <td> de la fila
	    // seleccionada
	    $(this).parents("tr").find("td").each(function(){
	        //valores+=$(this).html()+"\n";
	        valor[i]=$(this).html();
	        i++;
	    });
	   // for(var a=0;a<=2;a++){
	    // alert( valor[a]);
	    //}
	     $("#modal_idcliente_eliminar").val(valor[0]);
	     $("#modal_nombre_eliminar").val(valor[1]);
	     $("#modal_cedula_eliminar").val(valor[2]);
	    

	     
	     
	});
 });