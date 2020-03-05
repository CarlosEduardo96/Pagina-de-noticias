<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Count</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/materialize.min.css">

</head>
<body>

    <div class="container">
        <div class="row">
            
            <div class="col s12 m12">
                <div class="card blue-text text-darken-2">
                    <div class="card-content blue-text">
                        <span class="card-title center">Crear Cuenta</span>
                    </div>

                    <div class="card-action">
                        <form>                        
                            <div class="row card" id="mensaje" hidden>
                                <div class="input-field col s12 red-text center">
                                    <h4 id="texto">Respuesta</h4>
                                </div>
                            </div>

                            <div class="row" >

                                <div class="input-field col s6">
                                    <i class="material-icons prefix">create</i>
                                    <input id="nombre" type="text" class="validate">
                                    <label for="nombre">Nombre</label>
                                </div>

                                <div class="input-field col s6">
                                    <i class="material-icons prefix">create</i>
                                    <input id="apellido" type="text" class="validate">
                                    <label for="apellido">Apellido</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="correo" type="email" class="validate">
                                    <label for="correo">Correo Electronico</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">lock</i>
                                    <input id="pwd" type="password" class="validate">
                                    <label for="pwd">Contraseña</label>
                                </div>

                                <div class="input-field col s6">
                                    <i class="material-icons prefix">lock</i>
                                    <input id="cpwd" type="password" class="validate">
                                    <label for="cpwd">Confirmar Contraseña</label>
                                </div>
                            </div>
                            <div class="row center">
                                <div class="input-field col s6">
                                    <button class="btn waves-effect waves-light" type="button" id="cancelar">Cancelar
                                        <i class="material-icons right">backspace</i>
                                    </button> 
                                </div>

                                <div class="input-field col s6">
                                    <button class="btn waves-effect waves-light" type="submit" id="registrar">Crear una Cuenta
                                        <i class="material-icons right">person_add</i>
                                    </button>                                     
                                </div>
                            </div>                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/cuenta.js"></script>
</body>
</html>