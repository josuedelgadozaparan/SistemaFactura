
////MOSTAR FORMULARIO DE LOGEO////////////// no se usa
function MostraLogin() {
	$(document).ready(function(){
		$("#hide").click(function(){
			setTimeout(function() {
			$("#element").fadeOut(2500);
		},400);
			//$("#element").hide();
      var nestedDiv = document.getElementById("IdEstadoLogeo");
         nestedDiv.textContent = "";

		});
		$("#show").click(function(){
			setTimeout(function() {
			$("#element").fadeIn(1500);
		},200);
			//$("#element").show();
		});
	});
}
/////////////////////////////////

////EFECTO DE MOSTRAR CONTENEDORES//////////////
function MostrarEfectosContenedores() {
$(document).ready(function() {   
		setTimeout(function() {
			$(".content1").fadeIn(2500);
		},400);
	});
}
/////////////////////////////////

////VELOCIDAD DEL SLIDER//////////////
function VelocidadSlider() {
$('.carousel').carousel({
			interval: 2000
		})
}
/////////////////////////////////


////VALIDAR CAMPOS DE LOGEO//////////////
function proceso()
    {
      //alert("NNNNNNN");
       var IdLoginUsuario=document.getElementById('IdLoginUsuario').value;
       var IdPasswordUsuario=document.getElementById('IdPasswordUsuario').value;
       //alert("se "+document.getElementById('IdLoginUsuario').value+document.getElementById('IdPasswordUsuario').value);
       //alert(IdLoginUsuario +IdPasswordUsuario);

      if(IdLoginUsuario.length==0||IdPasswordUsuario.length==0)
      {
		alert("Usuario  y/o contraseña vacios");
		 var nestedDiv = document.getElementById("IdEstadoLogeo");
         nestedDiv.textContent = "Usuario  y/o contraseña vacios";
      }
      else
      {
      	
 		  $("#IdBtnAccederOculto").click();

      	
      }

	}

/////////////////////////////////

///////////////////////////////// para mostrar el formulario de creacion de un usuario
function mostrarformulariousuario()
    		{

            $('#FormularioUsuario').fadeIn() ;
            $('#mostrarformulariousuario').fadeOut() ;
               
            
        }
 /////////////////////////////////

///////////////////////////////// para mostrar el boton crear usuario y ocultar el formulario
 function ocultarfrmusuarioymostrarboton()
    		{
			$('#FormularioUsuario').fadeOut() ;
            $('#mostrarformulariousuario').fadeIn() ;

    		}
   /////////////////////////////////

   
$(document).ready(main);
 
var contador = 1;
 
function main () {
  $('.navbar-header').click(function(){
    if (contador == 1) {
      $('.nav').animate({
        left: '0'
      });
      contador = 0;
    } else {
      contador = 1;
      $('.nav').animate({
        left: '-100%'
      });
    }
  });

  // Mostramos y ocultamos submenus
  $('.dropdown').click(function(){
    $(this).children('.dropdown-menu').slideToggle();
  });
}