<!DOCTYPE html>
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
					<li>
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
                                        <li class="active">
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
                                        <h2>Lista de Chamada</h2>
                                        <h4>Selecione a Celula</h4>
                                        <div class="msg">

                                        </div>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-primary atualizar" style="float:right;"><i class="glyphicon glyphicon-refresh"></i> &nbsp;Atualizar</button>
                                    </div>

                                    <div class="tabela">
                                        <table class="table table-hover table-responsive" id="tabela"><br>
                                            <thead>
                                                <th width="10%">Codigo</th>
                                                <th>Nome da Celula</th>
                                                <th>Rede</th>
                                                <th>Codigo Lider</th>
                                                <th width="15%">Opções</th>
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
        
    </body>
    
    <script src="../js/listchamada.js" type="text/javascript"></script>
    
</html>
