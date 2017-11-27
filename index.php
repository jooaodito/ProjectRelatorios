<!DOCTYPE html>
<?php
    session_start();
    
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Area de Login</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
        <!-- FontAwesome 4.3.0 -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        
        <link href="dist/css/css.css" rel="stylesheet" type="text/css" />
    </head>
    
    <body background="dist/img/pexelsphoto.jpg" style="background-size: cover;">
     
        <div align="center">
            <form method="POST" action="dist/php/valida.php">
            <div class="box box-solid box-primary" style="height:auto; width:400px; margin-top: 10%;">
                <div class="box-header">
                    <h4>Tela de Login</h4>
                </div>
                <div class="box-body" align="left">
                    <p class="text-center text-danger">
                        <?php
                            if(isset($_SESSION['msg'])){
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                            }
                        ?>
                    </p>
                    <p>Email:</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input class="form-control" name="usuario" placeholder="Email" type="email">
                    </div>
                    <br>
                    <p>Senha:</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input class="form-control" name="senha" placeholder="Senha" type="password">
                    </div>
                    <br>
                    
                    <button type="button" class="btn btn-block btn-primary btn-flat" data-toggle="modal" data-target="#myModal">Recuperar senha</button>
                    <input type="submit" class="btn btn-block btn-primary btn-flat" name="btnLogin" value="Entrar">
                    
                </div>
            </div>
            </form>
        </div>
        
        <div id="myModal" class="modal modal-primary fade" role="dialog">
            <form method="POST" action="dist/php/recuperarsenha.php">
                        <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Recuperar Senha</h4>
                        </div>
                        <div class="modal-body">
                      <p style="text-align: left;"><br> Digite seu email:</p>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input class="form-control" name="emailRecupera" placeholder="Digite seu email" type="email">
                      </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-default btn-flat" type="button" data-dismiss="modal">Sair</button>   
                            <input type="submit" class="btn btn-default btn-flat" name="btnRecuperar" value="Enviar">
                        </div>
                      </div>
                    </div>
                </form>
        </div>
        
        <script src="js/bootstrap/bootstrap.min.js" type="text/javascript"></script> 
    </body>   
    
</html>
