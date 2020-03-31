<?php
    session_start();    

    if(validacion()){
        $datos=actualizar($_POST['id'],$_POST['titulo'],$_POST['descripcion'],$_POST['noticia']);
        echo($datos);
    }
    else{        
        echo("¡Rellene el formulario! ");
    }

    //::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    function validacion(){
        $ok=false;

        if(isset($_POST['id']) && isset($_POST['titulo']) && isset($_POST['descripcion']) && isset($_POST['noticia'])){
            $ok=true;
        } 

        return $ok;
    }


    function actualizar($id,$titulo,$descripcion,$noticia){
        include("db.php");
        $datos=null;
        $comando="update noticias set titulo='$titulo', descripcion='$descripcion', noticia='$noticia' where id='$id'";
        $servidor=mysqli_query($conectar,$comando);
        if($servidor){   
            $imagen=salvarimagen($id);
            $datos=array(
                "request"=>true,
                "msn"=>"¡Datos Guardados con exito!",
                "imagen"=>$imagen
            );            
        }   
        else{
            $datos=array(
                "request"=>false,
                "msn"=>"¡Error al guardar los datos!"
            );     
        }
        return  json_encode($datos);
    }

    function salvarimagen($id){
        //salvar la imagen
        include("db.php");
        $ok=null;
        if(isset($_FILES["imagen"]["name"])){           
            $comando="select id_autor,fecha from noticias where id='$id'";
            $link=mysqli_query($conectar,$comando);
            if($resul=mysqli_fetch_assoc($link)){
                $fechaComoEntero = strtotime($resul['fecha']);                
                $imagen=$resul['id_autor'].date("Y-m-d-H-i-s",$fechaComoEntero);
                $path="../img/".$imagen.".png";
                move_uploaded_file($_FILES["imagen"]["tmp_name"],$path);
                $ok=$path;
            }            
        }
        return $ok;
    }
?>