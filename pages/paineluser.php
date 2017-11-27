<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Painel Usuario</title>
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
                                        <h2>Painel Usuarios</h2>
                                        <div class="msg">

                                        </div>
                                    </div>
                                    <div>
                                        <a href="caduser.php" class="btn btn-primary"><i class="glyphicon glyphicon-list-alt"></i> &nbsp;Cadastrar</a>
                                        <button type="button" class="btn btn-primary atualizar" style="float:right;"><i class="glyphicon glyphicon-refresh"></i> &nbsp;Atualizar</button>
                                    </div>

                                    <div class="tabela">
                                        <table class="table table-hover table-responsive" id="tabela"><br>
                                            <thead>
                                                <th width="10%">Codigo</th>
                                                <th>Nome</th>
                                                <th>Data de nasc</th>
                                                <th>Nivel</th>
                                                <th>Rede</th>
                                                <th>Codigo Lider</th>
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
        
        <div class="modal fade modaleditar" id="modaleditar" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Alterar Nivel</h4>
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
    
    <script src="../js/cruduser.js" type="text/javascript"></script>
    
</html>
