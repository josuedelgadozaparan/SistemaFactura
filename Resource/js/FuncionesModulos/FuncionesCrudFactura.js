$(document).ready(function() {
		//obtenemos el valor de los input
	
	$('#adicionar').click(function() {
		var IdProduc = document.getElementById("idproducto").value;
		var nombre = document.getElementById("txtNombre").value;
		var valor = document.getElementById("txtValor").value;
		var cantidad = document.getElementById("txtCantidad").value;
		var total = document.getElementById("txtSubtotal").value;
		var cod = document.getElementById("txtCodigo").value;

        if(cod===''){

       		swal("Advertencia!", "No ha seleccionado ningun producto!", "warning");
       		document.getElementById("txtCodigo").focus();

        }else if(total===''){

       		swal("Advertencia!", "No ha seleccionado un nuevo producto para agregarlo a la tabla!", "warning");
       		document.getElementById("txtCodigo").focus();

       }else{
       	  var i = 1; 
	      //contador para asignar id al boton que borrara la fila
	       var fila = '<tr class="text-center" id="row' + i + '"><td>' + IdProduc + '</td><td>' + nombre + '</td><td>' + valor + '</td><td>' + cantidad + '</td><td>' + total + '</td><td><button type="button" name="remove" id="' + i + '" class="boton2"><span class="icon-trash"></span></button></td></tr>'; //esto seria lo que contendria la fila

	       i++;
	       

		    $('#TablaDinamicaLoad tr:first').after(fila);
		    $("#adicionados").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
		    var nFilas = $("#TablaDinamicaLoad tr").length;
		    $("#adicionados").append(nFilas - 1);
		    //le resto 1 para no contar la fila del header		   

		    document.getElementById("txtNombre").value ="";
		    document.getElementById("txtValor").value = "";
		    document.getElementById("txtCantidad").value = "1";
		    document.getElementById("txtSubtotal").value = "";
		    document.getElementById("txtCodigo").focus();

	    }

	});


	$(document).on('click', '.boton2', function() {		

		aux2=null;
	    aux=null;
	    var formatNumber = {
			 separador: ".", // separador para los miles
			 sepDecimal: ',', // separador para los decimales
			 formatear:function (num){
			 num +='';
			 var splitStr = num.split('.');
			 var splitLeft = splitStr[0];
			 var splitRight = splitStr.length > 1 ? this.sepDecimal + splitStr[1] : '';
			 var regx = /(\d+)(\d{3})/;
			 while (regx.test(splitLeft)) {
			 splitLeft = splitLeft.replace(regx, '$1' + this.separador + '$2');
			 }
			 return this.simbol + splitLeft +splitRight;
			 },
			 new:function(num, simbol){
			 this.simbol = simbol ||'';
			 return this.formatear(num);
			 }
			}
       
		var button_id = $(this).attr("id");
	    //cuando da click obtenemos el id del boton
	    var valorUnitario=document.getElementById("TablaDinamicaLoad").rows[button_id].cells[4].innerText.replace(/[$.()\s]/g, '');
	    var canArt=document.getElementById("TablaDinamicaLoad").rows[button_id].cells[3].innerText.replace(/[$.()\s]/g, '');
	    var tot=document.getElementById('txtTotal').value.replace(/[$.()\s]/g, '');
	    var totAr=document.getElementById('txtTotalAr').value;

	    var aux = parseInt(tot)-parseInt(valorUnitario);
	    var aux2 = parseInt(aux);

	    var aux3 = parseInt(Total_Valor)-parseInt(valorUnitario);
	    var aux4 = parseInt(aux3);

	    var aux5 = parseInt(totAr)-parseInt(canArt);
	    var aux6 = parseInt(aux5);


	    var aux7 = parseInt(total_articulos)-parseInt(canArt);
	    var aux8 = parseInt(aux7);




	    
        

	     if(aux2<=0){

	     	document.getElementById("txtTotal").value ="";
	     	document.getElementById("txtTotalAr").value ="";
	     	total_articulos=null;
	     	Total_Valor=null;
	     	totAr=null;
	     	aux2=null;
	        aux=null;

	     }else{

	     	document.getElementById("txtTotal").value =formatNumber.new(aux2,"$");
	     	document.getElementById("txtTotalAr").value =aux6;
	     	Total_Valor=aux4;	
	     	total_articulos=aux8;     	
	     	aux2=null;
	        aux=null;

	     }

	    
	     
	    aux2=null;
	    aux=null;
	    
	    var id = $(this).attr("id");
	    $('#row' + id + '').remove(); //borra la fila	    
	    //limpia el para que vuelva a contar las filas de la tabla
	    $("#adicionados").text("");
	    var nFilas = $("#TablaDinamicaLoad tr").length;
	    $("#adicionados").append(nFilas - 1);
	    document.getElementById("idproducto").value ="";
	    cont=0;
		swal("OK!", "El item fue eliminado correctamente! ", "success");
		i=i-1;
		
		
	});

});




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

function myFunction(e) {

	$(e).parent().parent().remove();
		
}

function proceso(){

	var valortotal_=document.getElementById('txtTotal').value.replace(/[$.()\s]/g, '');
	var recibido_=document.getElementById('txtRecibido').value.replace(/[$.()\s]/g, '');
	var aux1 = parseInt(valortotal_);
	var aux2 = parseInt(recibido_);
	
	if(aux1 > aux2){ 

			swal("Advertencia!", "El valor recibido es inferior que el total de la factura, favor verificar!", "warning");
			document.getElementById('txtRecibido').focus();

		}else{			


		$("#porfin").click(); 

      }


}


function cargarinsertar() {

	var numerodefactura_=document.getElementById('txtConsecutivo').value; 
	var cantidadtotalart_=document.getElementById('txtTotalAr').value; 
	var valortotal_=document.getElementById('txtTotal').value.replace(/[$.()\s]/g, '');             
	var idcliente_=document.getElementById('idcliente').value;
	var recibido_=document.getElementById('txtRecibido').value.replace(/[$.()\s]/g, '');
	var idusuario_=document.getElementById('IdUsuario').value;
	var Documento_=document.getElementById('txtDocumento').value;
	var ProductoAgregados=document.getElementById('TablaDinamicaLoad').rows.length; 
	var tota=document.getElementById('txtTotal').value.replace(/[$.()\s]/g, '');
	var res=false;

	
	if(ProductoAgregados==2){

		swal("Advertencia!", "Usted no ha seleccinado ningun producto, favor verificar!", "warning");
		document.getElementById('txtCodigo').focus();

		

	}else if(tota ===''){

		swal("Advertencia!", "Usted no ha seleccinado ningun producto, favor verificar!", "warning");
		document.getElementById('txtCodigo').focus();

		

	}else if (Documento_===''){

		swal("Advertencia!", "El campo documento está vacío, favor verificar!", "warning");
		document.getElementById('txtDocumento').focus();
		

	}else if (recibido_===''){

		swal("Advertencia!", "El campo recibido está vacío, favor verificar!", "warning");
		document.getElementById('txtRecibido').focus();

	}else if (numerodefactura_===''){

		swal("Advertencia!", "El campo consecutivo está vacío, favor verificar!", "warning");
		document.getElementById('txtConsecutivo').focus();

	}else{	


	

	$.ajax({
		type:  "GET",
		url:   "../SistemaFactura/Model/ProcesoAjax.php",
		data: {"valorCaja2":'A',"valorCaja4" : numerodefactura_,"valorCaja5" : cantidadtotalart_,"valorCaja6" : valortotal_,"valorCaja7" : recibido_,"valorCaja8" : idcliente_,"valorCaja9" : idusuario_},
		success:  function (response) {
			if(response==null){
        	//alert("vacio");
        	}else{

		    }
	    },  
		error: function(objeto, quepaso, otroobj){
				// alert("Estas viendo esto por que fallé"+valor);
			 }

		}); 


    var idfactura_fd=document.getElementById('idfactura').value;

    var cambio = parseInt(idfactura_fd)+1;
   
    var idproducto_fd=0;  ////para factura_detalle
    var cantidad_fd=0;  ////para factura_detalle
    var subtotal_fd=0;  ////para factura_detalle
    var textos = '';
    var cantidad=0;
    var cantidad_acomulada=0;
    var valores='';
    var total_acomulado=0;
    for (var i=1;i<document.getElementById('TablaDinamicaLoad').rows.length;i++) {
      	for (var j=0;j < document.getElementById('TablaDinamicaLoad').rows[i].cells.length-1;j++)
      	{
      		textos = document.getElementById('TablaDinamicaLoad').rows[i].cells[j].innerHTML ;
      		valores=document.getElementById('TablaDinamicaLoad').rows[i].cells[2].innerHTML.replace(/[$.()\s]/g, '');
            cantidad= document.getElementById('TablaDinamicaLoad').rows[i].cells[3].innerHTML;//OK
            idproducto_fd= document.getElementById('TablaDinamicaLoad').rows[i].cells[0].innerHTML;//OK
            subtotal_fd= document.getElementById('TablaDinamicaLoad').rows[i].cells[4].innerHTML.replace(/[$.()\s]/g, '');//OK

        }

        //ajax envio a factura_detalle//////


       $.ajax({
           	type:  "GET",
           	url:   "../SistemaFactura/Model/ProcesoAjax.php",
           	data: {"valorCaja2":'C',"valorCaja3" : cambio,"valorCaja4" : idproducto_fd,"valorCaja5" : cantidad,"valorCaja6" : subtotal_fd},
           	success:  function (resp) {

           		if(resp==null){
      			//  alert("vacio");
                }else{

                	
					

                }


            },  
            error: function(objeto, quepaso, otroobj){
                  swal("Error!", "La factura no fue registrada!", "warnign");
                }


        }); 

       







       

      

    }


    
    
	res=true;

	if(res==true){
    	
    	swal("OK!", "Factura registrada exitosamente!", "success");

    }




    

}


	var valortotal_=document.getElementById('txtTotal').value.replace(/[$.()\s]/g, '');
	var recibido_=document.getElementById('txtRecibido').value.replace(/[$.()\s]/g, '');
	var aux1 = parseInt(valortotal_);
	var aux2 = parseInt(recibido_);

    if(aux1 < aux2){ 

		var aux3 = parseInt(aux2)-parseInt(aux1);			    		
	    alert("                                 Cambio: $"+aux3);

	}



        
}


