

	$('#Usuarios').click(function(){
    var button = $('#Usuarios');

    var idusu=document.getElementById('Idusuario').value;
    
    if(idusu==='1'){


     $(this).attr('href', '?controlador=usuario&accion=Iniciar_usuario'); 


    }else{  

       swal("Advertencia!", "Usted no tiene permiso de usuario para acceder a este modulo, favor consultar con el admnistrador!", "warning");	
       return false; 

     }
});


$('#Productos').click(function(){
    var button = $('#Productos');

    var idusu=document.getElementById('Idusuario').value;
    
    if(idusu==='1'){


     $(this).attr('href', '?controlador=producto&accion=Iniciar_producto'); 


    }else{  

         swal("Advertencia!", "Usted no tiene permiso de usuario para acceder a este modulo, favor consultar con el admnistrador!", "warning");	
       return false; 

     }
});



$('#Proveedores').click(function(){
    var button = $('#Proveedores');

    var idusu=document.getElementById('Idusuario').value;
    
    if(idusu==='1'){


     $(this).attr('href', '?controlador=proveedor&accion=Iniciar_proveedor'); 


    }else{  

         swal("Advertencia!", "Usted no tiene permiso de usuario para acceder a este modulo, favor consultar con el admnistrador!", "warning");	
       return false; 

     }
});

     






		
