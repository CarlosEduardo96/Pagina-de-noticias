<?php
    session_start();
    include("../php/db.php");
    $datos=null;
    if(isset($_POST["id"]) && isset($_POST["comentario"]) ){
        if($_POST["id"]!="" && $_POST["comentario"]){
            date_default_timezone_set("America/Mexico_City");
            $fecha=(string)date('Y-m-d H-i-s a');
            $user=$_SESSION['user']." ".$_SESSION['ape'];
            $comentario=$_POST["comentario"];
            $id_pu=$_POST["id"];
            $id_user=$_SESSION['id'];

            $consulta="insert into comentarios values(null,'$fecha','$user','$comentario','$id_pu','$id_user');";
            $servidor=mysqli_query($conectar,$consulta);
            if($servidor){
                $datos=array(
                    "request"=>true,
                    "msn"=>"¡Publicado con exito!",                    
                    "user"=>$user,
                    "text"=>$comentario
                );
                echo json_encode($datos);
            }
            else{
                $datos=array("request"=>false,"msn"=>"¡Error al publicar el comentario intente de nuevo!");
                echo json_encode($datos);
            }
        }
        else{        
            $datos=array("request"=>false,"msn"=>"¡Comentario Vacio!");
            echo json_encode($datos);
        }
    }
    else{        
        $datos=array("request"=>false,"msn"=>"¡Nada que comentar!");
        echo json_encode($datos);
    }
?>