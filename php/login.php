<?php
    session_start();
    include("../php/db.php");

    if(isset($_POST['user']) && isset($_POST['pwd'])){

        $user= $_POST['user'];
        $pwd= $_POST['pwd'];        

        $comando=mysqli_query($conectar,"SELECT * FROM usuario WHERE email='$user'");
        if($resul=mysqli_fetch_assoc($comando)){
            if($resul['pwd']==$pwd){
                $_SESSION['id']=$resul['id'];
                $_SESSION['user']=$resul['nombre'];
                $_SESSION['ape']=$resul['apellidos'];
                $_SESSION['roll']=$resul['roll'];
                $fecha=(string)date('Y-m-d H-i-s');
                $id=$resul['id'];         
                $link=mysqli_query($conectar,"Update usuario Set ultimavez='$fecha' where id=$id");
                if($link){
                    echo("true");
                }
                else{
                    echo("Error al iniciar sesion ");
                }
                              
            }            
            else{
                echo("Usuario y contraseña no validos");
            }
        }
        else{
            echo("Ingrese usuario y contraseña");

        }
    }
?>