<?php
    include("db.php");
    if(isset($_POST['nombre']) && isset($_POST['correo'])){        
        $nombre= strtoupper($_POST['nombre']);
        $apellido= strtoupper($_POST['apellido']);        
        $correo= strtoupper($_POST['correo']);
        $pwd=$_POST['pwd'];
        $cpwd=$_POST['cpwd'];

        if($nombre!="" && $apellido!="" && $correo!="" && $pwd!="" && $cpwd!=""){
            if($pwd==$cpwd){                
                $consulta="SELECT * FROM usuario WHERE email='$correo'";                
                $servidor=mysqli_query($conectar,$consulta);
                if($resul=mysqli_fetch_assoc($servidor)){
                    echo("El usuario ya esta registrado");
                }
                else{
                    date_default_timezone_set("America/Mexico_City");
                    $fecha=(string)date('Y-m-d H-i-s');
                    $consulta="Insert into usuario values(null,'$nombre','$apellido','$correo','$pwd','$fecha','USER');";
                    $servidor=mysqli_query($conectar,$consulta);
                    if($servidor){
                        echo("true");
                    }
                    else{
                        echo("Error al registar el Usuario");
                    }
                }               
                
            }
            else{
                echo("¡La contraseña debe de coincidir!");
            }

        }
        else{
            echo("¡Formulario incompleto! ¡Porfavor rellene los campos..!");
        }
        
    }
?>