$(document).ready(function(){
    $("#iniciar").click(function(event){
        event.preventDefault();
        var user= $("#usuario").val();
        var pass= $("#contraseña").val();

        $.post("php/login.php",{
            user: user,
            pwd: pass
        },function(respuesta){
            if(respuesta=="true"){               
                window.location.href = "/materialize/php/menu.php";                          
            }
            else{
                $("#mensaje").show();
                $("#text").text(respuesta);                
            }            
        }).done(function(){
            console.log("Ejecucion exitosa");
        }).fail(function(){
            console.log("Error al enviar los datos al servidor");
        }).always(function(){
            console.log("Ejecucion finalizada");
        });
        
    });

    $("#adduser").click(function(){
        console.log("Crear cuenta");
        window.location.href = "/materialize/php/cuenta.php";   
    });

});