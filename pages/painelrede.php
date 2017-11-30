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
        <title>Painel Rede</title>
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
                        <a href="../dist/php/sair.php" class="btn btn-default"style="float: right; margin-top:5px; margin-right: 0%;"><i class="fa fa-power-off"></i>&nbsp; Sair</a>
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
                        <div class="resposta">
                            <h2>Painel Rede</h2>
                            <div class="msg">

                            </div>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary" id="btnCadastrarNivel" data-toggle="modal" data-target="#modalCad"><i class="glyphicon glyphicon-list-alt"></i> &nbsp;Cadastrar</button>
                            <button type="button" class="btn btn-primary atualizar" style="float:right;"><i class="glyphicon glyphicon-refresh"></i> &nbsp;Atualizar</button>
                        </div>

                        <div class="tabela">
                            <table class="table table-hover table-responsive" id="tabela"><br>
                                <thead>
                                    <th width="10%">Codigo</th>
                                    <th>Descrição</th>
                                    <th width="20%">Opções</th>
                                </thead>
                                <tbody class="loadniveis">

                                </tbody>
                            </table>
                            <div class="carregando">
                                <p class="alert alert-info"><img src="../img/load.gif" alt="Carregando..." width="20"> &nbsp; Carregando os dados!</p>
                            </div>
                        </div>

                    </div>
            </div>
        </div>
        
        <div class="modal fade" id="modalCad" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Cadastrar Rede</h4>
                    </div>
                    <form method="POST" name="cadastroNivel" action="">
                        <div class="modal-body">
                            <p style="text-align: left;"><br> ID</p>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                <input class="form-control" type="text" readonly="true" name="idNivel" id="idNivel" style="width:15%;">
                            </div>

                            <p style="text-align: left;"><br> Descrição</p>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-star"></i></span>
                                <input class="form-control" type="text" name="descnivel" style="width:30%;">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default j_buttom" value="Cadastrar"/>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="modal fade modaleditar" id="modaleditar" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Alterar Rede</h4>
                    </div>
                    <form method="POST" name="editarnivel" action="">
                        <div class="modal-body">
                            <p style="text-align: left;"><br> ID</p>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                <input class="form-control" type="text" readonly="true" name="idnivel" id="idnivel" style="width:15%;">
                            </div>

                            <p style="text-align: left;"><br> Descrição</p>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-star"></i></span>
                                <input class="form-control" type="text" name="descnivel" style="width:30%;">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default j_buttomalt" value="Alterar"/>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </body>
    
    <script src="../js/crudrede.js" type="text/javascript"></script>
    
</html>
