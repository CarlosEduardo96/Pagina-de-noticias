$(document).ready(function(){
   //Dropdown
   $('.dropdown-trigger').dropdown();

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


    //comentarios
    $("#publicar").bind("submit",function(){
        var msn=$("#txtxomentario").val();
        alert("Publicando: "+msn);
        $("#publicar")[0].reset();
        return false;
    });
});