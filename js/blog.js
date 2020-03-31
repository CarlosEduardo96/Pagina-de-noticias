$(document).ready(function(){
    //Dropdown
    $('.dropdown-trigger').dropdown();
    //toolped informacion del boton
    $('.tooltipped').tooltip();
    //Modales
    $('.modal').modal();
    
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
        
        var datos= new FormData();
        let params = new URLSearchParams(location.search);
        var valor = params.get('id');
        datos.append("comentario",$("#txtxomentario").val());
        datos.append("id",valor);        


        $.ajax({
            url: "insertarPubli.php",
            type: "POST",
            data: datos,
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function(){
                M.toast({ html: 'Publicando...'} );
            },
            success: function(respuesta){
                var respuesta= JSON.parse(respuesta);
                console.log(respuesta);
                if(respuesta.request){
                    M.toast({html: respuesta.msn });
                    $("#predefinido").hide("slow");
                    $("#lista").append("<tr><td> <span class=\"blue-text\">"+respuesta.user+"</span> [<span class=\"red-text\">Reciente</span>] <p>"+respuesta.text+"</p> </td></tr>");
                }
                else{
                    M.toast({html: respuesta.msn });
                }
            },
            error: function(){
                M.toast({html: 'Error al conectar con el servidor'});
            }
        });
        return false;
    });

    //Eliminar noticia_____________________:::::::::::::::::::::::::::::::::::
    $("#eliminar").click(function(){        
        let params = new URLSearchParams(location.search);
        var valor = params.get('id');
        var datos= new FormData();
        datos.append("id",valor);
        $.ajax({
            url: "eliminarnoticia.php",
            type: "POST",
            data: datos,
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function(){
                M.toast({ html: 'Eliminando...'} );
            },
            success: function(respuesta){
                var datos= JSON.parse(respuesta);
                console.log(respuesta);
                if(datos.request){
                    alert(datos.msn);
                    location.href="/materialize/php/menu.php";
                }
                else{
                    M.toast({ html: datos.msn } );
                }
            },
            error: function(){
                M.toast({html: 'Error al conectar con el servidor'});
            }
        });
    });

    //Editar noticia__________________________________________________________
    $("#formularioNota").bind("submit",function(){
        var datos= new FormData();
        let params = new URLSearchParams(location.search);
        var valor = params.get('id'); 
        var titulo= $("#tituloNota").val();   
        var descripcion= $("#descripcionNota").val();  
        var noticia= $("#cuerpoNota").val();
        datos.append("id",valor); 
        datos.append("titulo",titulo);
        datos.append("descripcion", descripcion);
        datos.append("noticia",noticia);        
        datos.append("imagen",$("input[name=imagen]")[0].files[0]);
        $.ajax({
            url: "actualizarnoticia.php",
            type: "POST",
            data: datos,
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function(){
                M.toast({ html: 'Actualizando...'} );
            },
            success: function(respuesta){
                console.log(respuesta);
                var datos= JSON.parse(respuesta);
                console.log(datos);
                if(datos.request){        
                    M.toast({html: datos.msn});
                    $("#btitulo").text(titulo);
                    $("#bdescripcion").text(descripcion);
                    $("#bnoticia").text(noticia);
                    M.toast({html: "¡Porfavor recarge la pagina para actualizar los datos!"});  
                    

                }
                else{                    
                    M.toast({html: datos.msn});                    
                }              
                                
            },
            error: function(){
                M.toast({html: 'Error al conectar con el servidor'});
            }
        });
        return false;
    });

    //setvalues=
    $("#edit").click(function(){       
        $("#tituloNota").val($("#btitulo").text());
        $("#descripcionNota").val($("#bdescripcion").text());
        $("#cuerpoNota").val($("#bnoticia").text());        
        
    });
    //regrescar
    $("#refrescar").click(function(){    
        var url=location.href;
        location.href=url;
    });
    
   
    // guardar ............
    
    /* Refresca la pagina web en un determinado periodo de tiempo*/
    setInterval(function() {        
        $("#lista").load(location.href+" #lista");
    },20000);
    
    /*___________________________________________________*/
});

