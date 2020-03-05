<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/materialize.min.css">
    <title>Login</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <div class="card blue-text text-darken-2">
                <div class="card-content blue-text">
                    <span class="card-title center">Inicio de sesion</span>
                </div>

                <div class="card-action">
                    <div class=row>
                        <div class="col s12 m2"></div>
                            <form class="col s12 m8">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <div class="card-panel center red-text" id="mensaje" hidden> 
                                            <h5 id="text"></h5>                                                      
                                        </div>
                                    </div>
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">account_circle</i>
                                        <input id="usuario" type="email" class="validate">
                                        <label for="usuario">Usuario</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">lock</i>
                                        <input id="contraseña" type="password" class="validate">
                                        <label for="contraseña">Contraseña</label>
                                    </div>
                                    <div class="input-field col s6 center">                                        
                                        <button class="btn waves-effect waves-light" type="button" id="adduser">Crear una Cuenta
                                            <i class="material-icons right">person_add</i>
                                        </button> 
                                    </div>
                                    <div class="input-field col s6 center"> 
                                        <button class="btn waves-effect waves-light" type="submit" id="iniciar">Entrar
                                            <i class="material-icons right">send</i>
                                        </button>                                         
                                    </div>
                                </div>
                            </form>
                        <div class="col s12 m2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/login.js"></script>
</body>
</html>