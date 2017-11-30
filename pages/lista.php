<!DOCTYPE html>
<?php
    session_start();
    
    if((!isset ($_SESSION['id_usuario']) == true)){
        
        unset($_SESSION['email_usuario']);
        unset($_SESSION['senha_usuario']);
        unset($_SESSION['nivel_id']);
        $_SESSION['msg'] = "Área reistrita!";
        header("location:../index.php");
    }
    
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista de Chamada</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/data.js"></script>
        <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>
        <script src="../js/main.js"></script>
        <link rel="stylesheet" href="../css/main.css">
        
        <!-- Font Awesome -->
        <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
                
    </head>
    <body style="background: #fff;">
        <div class="header container">
			<div class="logo">
				<i class="fa fa-tachometer"></i>
				<span>Relatorios - ICB Marilia</span>
			</div>
			<a href="#" class="nav-trigger"><span></span></a>
                        <a href="../dist/php/sair.php" class="btn btn-default" style="float: right; margin-top:5px; margin-right: 0%;"><i class="fa fa-power-off"></i>&nbsp; Sair</a>
		</div>
		<div class="side-nav">
			<div class="logo">
				<i class="fa fa-pie-chart"></i>
				<span>Relatorios - ICB</span>
			</div>
			<nav>
				<ul>
                                    <?php
                                        include_once ("../php/menu.php");
                                        echo $menu;
                                    ?>
				</ul>
			</nav>
		</div>
        <div class="main-content">
			<div class="main">
				<div class="container">
                                    <form method="POST" name="cadastroNivel" action="">
                                    <div class="resposta">
                                        <h2>Lista de Chamada</h2>
                                        <h4>Preencha a lista</h4>
                                        <div class="msg">

                                        </div>
                                    </div>
                                    <div>
                                        
                                            <label>Data da Celula:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                  <i class="fa fa-calendar"></i>
                                                </div>
                                                <input class="form-control" name="data" type="date">
                                            </div>
                                        
                                        </div>
                                    <div class="tabela">
                                        <table class="table table-hover table-responsive" id="tabela"><br>
                                            <thead>
                                                <th width="10%">Codigo</th>
                                                <th>Nome do Integrante</th>
                                                <th width="10%">Cod. Lider</th>
                                                <th width="2%">Presente</th>
                                                <th width="2%">Ausente</th>
                                            </thead>
                                            <tbody class="loadniveis">

                                            </tbody>
                                        </table>
                                        <div class="carregando">
                                            <p class="alert alert-info"><img src="../img/load.gif" alt="Carregando..." width="20"> &nbsp; Carregando os dados!</p>
                                        </div>
                                        <div>
                                            <input type="button" class="btn btn-success btn-md j_buttom" value="Enviar"/>
                                        </div>
                                        
                                        <br>
                                    </div>
                                    </form>
                                </div>
			</div>
		</div>
            </div>
        </div>
        
    </body>
    
    <script src="../js/lista.js" type="text/javascript"></script>
    
</html>
