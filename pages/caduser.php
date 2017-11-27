<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro Usuario</title>
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
        <div class="header">
			<div class="logo">
				<i class="fa fa-tachometer"></i>
				<span>Relatorios - ICB Marilia</span>
                                
			</div>
			<a href="#" class="nav-trigger"><span></span></a>
                        <a href="../index.php" class="btn btn-default"style="margin-left: 94%; margin-top:5px;"><i class="fa fa-power-off"></i>&nbsp; Sair</a>
                        <button class="btn btn-default"style="margin-left: 88%; margin-top:-58px;"><i class="fa fa-user"></i>&nbsp; Perfil</button>
		</div>
		<div class="side-nav">
			<div class="logo">
				<i class="fa fa-pie-chart"></i>
				<span>Relatorios - ICB</span>
			</div>
			<nav>
				<ul>
					<li class="active">
                                            <a href="paineluser.php">
						<span><i class="fa fa-user"></i></span>
						<span>Usuarios</span>
                                            </a>
					</li>
					<li>
                                            <a href="painelrede.php">
						<span><i class="fa fa-sitemap"></i></span>
						<span>Rede</span>
                                            </a>
					</li>
					<li>
                                            <a href="painelnivel.php">
						<span><i class="fa fa-star-o"></i></span>
						<span>Nivel</span>	
                                            </a>
					</li>
					<li>
                                            <a href="painelcelula.php">
                                                <span><i class="fa fa-users"></i></span>
						<span>Celulas</span>
                                            </a>
					</li>
                                        <li>
                                            <a href="painellista.php">
                                                <span><i class="fa fa-list-alt"></i></span>
						<span>Lista de chamada</span>
                                            </a>
					</li>
				</ul>
			</nav>
		</div>
        <div class="main-content">
            <div class="main">
                    <div class="container">
                        <div class="resposta">
                            <h2>Cadastro Usuario</h2>
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
                                              <label>Nome Completo:</label>
                                              <div class="input-group">
                                                <div class="input-group-addon">
                                                  <i class="fa fa-user"></i>
                                                </div>
                                                  <input class="form-control" name="nome" type="text">
                                              </div>
                                              </div>
                                            </div>

                                            <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Data de Nascimento:</label>
                                              <div class="input-group">
                                                <div class="input-group-addon">
                                                  <i class="fa fa-calendar"></i>
                                                </div>
                                                  <input class="form-control" name="nasc" type="date">
                                              </div>
                                            </div>
                                            </div>

                                            <div class="col-lg-3">
                                            <label>Nivel:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-sitemap"></i>
                                                </div>
                                                <input class="form-control nivel" name="nivel" readonly="true" type="text">
                                              <span class="input-group-btn">
                                                  <button class="btn btn-flat btn-info lernivel" type="button" data-toggle="modal" data-target="#ModalNivel"><i class="fa fa-search"></i></button>
                                              </span>
                                            </div>
                                            </div>

                                            <div class="col-lg-5">
                                            <div class="form-group">
                                              <label>Email:</label>
                                              <div class="input-group">
                                                <div class="input-group-addon">
                                                  <i class="fa fa-mail-forward"></i>
                                                </div>
                                                  <input class="form-control" name="email" type="email">
                                              </div>
                                              </div>
                                            </div>

                                            <br>
                                            <div class="col-lg-2">
                                            <div class="form-group">
                                              <label>Senha:</label>
                                              <div class="input-group">
                                                <div class="input-group-addon">
                                                  <i class="fa fa-lock"></i>
                                                </div>
                                                  <input class="form-control" name="senha" type="password">
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

                                            <div class="col-lg-2">
                                            <div class="form-group">
                                            <label>Superior:</label>
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
                                                    <a href="paineluser.php" class="btn btn-default btn-md" name="limpar">Voltar</a>
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
        
        <div id="ModalNivel" class="modal fade" role="dialog">
            <div class="modal-dialog">
                
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Niveis</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-hover table-responsive" id="tabela">
                        <thead>
                        <th width="10%">Codigo</th>
                        <th>Descrição</th>
                        <th width="20%">Opções</th>
                    </thead>
                    <tbody class="loadniveis2">
                            
                    </tbody>
                    </table>
                    
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
                </div>
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
           
        <script src="../js/cruduser.js" type="text/javascript"></script>
    </body>
</html>


