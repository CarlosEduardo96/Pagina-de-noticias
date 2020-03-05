<?php
session_start();
if (@!$_SESSION['user']) {
	header("Location: /php/menu.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias sin censura</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/materialize.min.css">
</head>
<body>        

    <div class="navbar-fixed">
        <nav class="red">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo"><i class="material-icons">public</i>Noticias</a>
                <ul class="right hide-on-med-and-down row">                
                  
                    <li><a href="#"><i class="material-icons">refresh</i></a></li>
                    <li><a href="#" class="dropdown-trigger" data-target="id_notas">Noticias<i class="material-icons right">view_module</i></a></li>
                    
                    <li><a class="dropdown-trigger" href="#!" data-target="id_drop">Opciones Avanzadas<i class="material-icons right">settingsx</i></a></li>
                    <li><a href="#" id="singout">Sing Out<i class="material-icons right">input</i></a></li>
                </ul>
               
            </div> 
        </nav>

        <nav id="buscar" class="red" hidden>
            <div class="nav-wrapper">
                <form>
                    <div class="input-field">
                    <input id="search" type="search" required>
                    <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                    <i id="cerrarb" class="material-icons">close</i>
                    </div>
                </form>
            </div>
        </nav>
        
    </div>
    
    <ul id="id_notas" class="dropdown-content">
        <li><a href="#">Hoy</a></li>          
        <li><a href="#">Esta semana</a></li>
        <li><a href="#">Este mes</a></li>
        <li><a href="#">Este año</a></li>
        <li><a href="#">Mas de un año</a></li>
    </ul>
    <ul id="id_drop" class="dropdown-content">         
        <li><a href="#">Configuracion</a></li>
        <?php
            if( $_SESSION['roll']=="ADMIN"){
                echo("<li><a href=\"#\">Panel de administracion</a></li>");
            }
            
        ?>
    </ul>
<!--Noticias_________________________-->
    <div id="Bloques" class="row">        
            <?php
                include("Noticias.php");
            ?>
    </div>

    <div class="fixed-action-btn direction-left active">
            <div class="row">                               
                <a class="btn-floating btn-large waves-effect waves-light tooltipped red" id="buscarbtn"data-position="left" data-tooltip="Buscar"><i class="material-icons">search</i></a>
            </div>
            <div class="row">                               
                <a class="btn-floating btn-large waves-effect waves-light tooltipped red" data-position="left" data-tooltip="Agregar una noticia"><i class="material-icons">add</i></a>
            </div>
            <div class="row">
                <a class="btn-floating btn-large waves-effect waves-light tooltipped red" data-position="left" data-tooltip="Mis Noticias"><i class="material-icons">folder_open</i></a>
            </div>
    </div>   
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script type="text/javascript" src="../js/menu.js"></script>    
</body>
</html>