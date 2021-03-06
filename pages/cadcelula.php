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
        <title>Cadastro Celula</title>
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
                            <h2>Cadastro Celula</h2>
                            <div class="msg">

                            </div>
                        </div>
                        <section class="content">
                                    <div class="row">
                                      <div class="box box-info">
                                          <div class="box-body">
                                            <form method="POST" name="cadastroNivel" action="">

                                            <div class="col-lg-6">
                                            <div class="form-group">
                                              <label>Nome:</label>
                                              <div class="input-group">
                                                <div class="input-group-addon">
                                                  <i class="fa fa-user"></i>
                                                </div>
                                                  <input class="form-control" name="nome" type="text">
                                              </div>
                                              </div>
                                            </div>

                                            <div class="col-lg-3">
                                            <label>Rede:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <input class="form-control rede" name="rede" readonly="true" type="text">
                                              <span class="input-group-btn">
                                                  <button class="btn btn-flat btn-info lerrede" type="button" data-toggle="modal" data-target="#ModalRede"><i class="fa fa-search"></i></button>
                                              </span>
                                            </div>
                                            </div>

                                            <div class="col-lg-3">
                                            <div class="form-group">
                                            <label>Lider:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-users"></i>
                                                </div>
                                                <input class="form-control superior" name="superior" readonly="true" type="text">
                                              <span class="input-group-btn">
                                                  <button class="btn btn-flat btn-info lersuperior" type="button" data-toggle="modal" data-target="#ModalSuperior"><i class="fa fa-search"></i></button>
                                              </span>
                                            </div>
                                            </div>
                                            </div>

                                            <div class="form-group" style="margin-left:1%;">
                                                <div class="input-group">
                                                    <input type="button" class="btn btn-success btn-md j_buttom" value="Cadastrar"/>&nbsp;
                                                    <a href="painelcelula.php" class="btn btn-default btn-md" name="limpar">Voltar</a>
                                                </div>
                                            </div>

                                            </form>
                                          </div>
                                        </div>

                                    </div>
                        </section>

                    </div>
            </div>
        </div>
        
        <div id="ModalRede" class="modal fade" role="dialog">
            <div class="modal-dialog">
                
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Rede</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-hover table-responsive" id="tabela">
                        <thead>
                        <th width="10%">Codigo</th>
                        <th>Descrição</th>
                        <th width="20%">Opções</th>
                    </thead>
                    <tbody class="loadredes">
                            
                    </tbody>
                    </table>
                    
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
                </div>
              </div>

            </div>
        </div>
        
        <div id="ModalSuperior" class="modal fade" role="dialog">
            <div class="modal-dialog">
                
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Superiores</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-hover table-responsive" id="tabela">
                        <thead>
                        <th width="10%">Codigo</th>
                        <th>Nome</th>
                        <th>Rede</th>
                        <th>Nivel</th>
                        <th width="20%">Opções</th>
                    </thead>
                    <tbody class="loadsuperior">
                            
                    </tbody>
                    </table>
                    
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
                </div>
              </div>

            </div>
        </div>
           
        <script src="../js/crudcelula.js" type="text/javascript"></script>
    </body>
</html>


