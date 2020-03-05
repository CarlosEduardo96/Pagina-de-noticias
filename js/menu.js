$( document ).ready(function(){
    
    //Dropdown
    $(".dropdown-trigger").dropdown();
    $('.tooltipped').tooltip();
    //__Buscar noticia____________
    $("#buscarbtn").click(function(){
       console.log("Has dado click");
       $("#buscar").show("slow");
    });
    $("#cerrarb").click(function(){
      console.log("Has dado click");
      $("#buscar").hide("slow");
    });
    //Cerrar Session______________________-
    $("#singout").click(function(){
      $.get("session.php",function(dato,status,xhr){
        console.log("Sesion cerrada: "+dato+"\nStatus: "+status+" "+xhr.status);        
        if(dato=="true"){
          alert("¡Asta luego! :)")
          window.location.href = "/materialize/index.php";
        }
        else{
          alert("No se pudo cerrar la sesion intente de nuevo");
          console.log("No se pudo cerrar la sesion intente de nuevo");
        }
      }).done(function(){
        console.log("Ejecucion Exitosa");
      }).fail(function(){
        console.log("Error al ejecutar la peticion");
      }).always(function(){
        console.log("Peticion finalizada");
      });
    });
    //_____________________________________________
  });
