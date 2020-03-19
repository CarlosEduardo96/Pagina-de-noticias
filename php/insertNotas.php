<?php
    session_start();
    include("../php/db.php");
    $datos=null;
    if(isset($_POST["titulo"]) && isset($_POST["descripcion"]) && isset($_POST["cuerpo"])){
        
        $id=$_SESSION['id'];
        $fecha=(string)date("Y-m-d-H-i-s");
        $titulo= $_POST["titulo"];
        $autor=$_SESSION['user']." ".$_SESSION['ape'];
        $descripcion=$_POST["descripcion"];
        $cuerpo=$_POST["cuerpo"];
        
        if($titulo!="" && $descripcion!="" && $cuerpo!="" && isset($_FILES["imagen"]["name"])){
            
            $ruta="../img/";
            //$namefile="imagen".date("dHis").pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION);
            $namefile=$id.$fecha.".png";
            $path=$ruta. $namefile;
            //$user=$_POST["user"];            
            $insert="insert into noticias values(null,'$fecha','$titulo','$autor','$descripcion','$cuerpo','$id');";
            $link=mysqli_query($conectar,$insert);
            if(move_uploaded_file($_FILES["imagen"]["tmp_name"],$path) && $link){
                //echo("true");
                $insert="SELECT MAX(id) AS folio FROM noticias";
                $link=mysqli_query($conectar,$insert);
                if($resul=mysqli_fetch_assoc($link)){
                    $datos=array("folio"=>$resul['folio'],"resultado"=>true,"msn"=>"¡Publicado con exito!","autor"=>$autor,"link"=>$path);
                }
                echo json_encode($datos);
            }
            else{
                //echo("¡Error al publicar la noticia!");
                $datos=array("resultado"=>false, "msn"=>"¡Error al publicar la noticia!");
                echo json_encode($datos);
            }    
        }
        else{
            //echo("¡Faltan Campos por rellenar!");
            $datos=array("resultado"=>false,"msn"=>"¡Faltan Campos por rellenar!");
            echo json_encode($datos);
        }
    }
    else{
        //echo("¡Rellene el formulario!");
        $datos=array("resultado"=>false,"msn"=>"¡Rellene el formulario!");
        echo json_encode($datos);
    }
?>