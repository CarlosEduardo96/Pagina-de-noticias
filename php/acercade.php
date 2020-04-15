<?php 
    session_start();
    if (@!$_SESSION['id']) {
        header("Location:menu.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acerca de...</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/materialize.min.css">
</head>
<body>
    <!--Barra de navegacion-->
    <div class="navbar-fixed">
        <nav class="red">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo"><i class="material-icons">public</i>Noticias</a>                
                <ul class="right hide-on-med-and-down row">                
                    <li><a><?php $name=$_SESSION['user']." ".$_SESSION['ape']; echo(strtoupper($name));?></a></li>
                    <li><a id="refrescar"><i class="material-icons">refresh</i></a></li>
                    <li><a href="menu.php">Noticias<i class="material-icons right">view_module</i></a></li>
                    
                    <li><a class="dropdown-trigger" href="#!" data-target="id_drop">Opciones Avanzadas<i class="material-icons right">settingsx</i></a></li>
                    <li><a href="acercade.php">Acerca de..<i class="material-icons right">info</i></a></li>
                    <li><a href="#" id="singout">Sing Out<i class="material-icons right">input</i></a></li>
                </ul>
               
            </div> 
        </nav>
        
    </div>
    <ul id="id_drop" class="dropdown-content">         
        <li><a href="#">Configuracion</a></li>
        <?php
            if( $_SESSION['roll']=="ADMIN"){
                echo("<li><a href=\"#\">Panel de administracion</a></li>");
            }
            
        ?>
    </ul>
    <!--Fin de la barra de navegacion-->
    <div class="container">    
        <div class="row">            

            <div class="col s12">
                <div class="card-panel row blue-grey darken-1 z-depth-2 hoverable">                                
                    <div class="col s12">                         
                        <div class="center">                                               
                            <img src="../img/infoper.png"class="circle" width="160" height="160">
                        </div>
                    </div>
                    <div class="col">
                        <blockquote class="white-text">
                            ¡Hola mi nombre es carlos eduardo creador y administrador de este sitio web!
                            Puedes contactarme a travez de facebook o github para mas informacon vea el pie de paguina.
                        </blockquote>
                    </div>
                </div>               
            </div>

            <div class="col s12">
                <div class="card-panel row blue-grey darken-1 z-depth-2 hoverable">   
                                            
                    <div class="col ">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d121174.82235280378!2d-95.8113407!3d18.3603642!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c3b5dc195af353%3A0x137ca62ab8bcf8dc!2sCosamaloapan%2C%20Ver.!5e0!3m2!1ses-419!2smx!4v1586029414535!5m2!1ses-419!2smx" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <div class="col">
                        <blockquote class="white-text">
                            Estamos ubicados en cosamaloapan. :)
                        </blockquote>
                    </div>
                </div>               
            </div>
        </div>        
    </div>    


    <?php include("piepage.php"); ?>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
</body>
</html>