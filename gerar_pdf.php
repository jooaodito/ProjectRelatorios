<html>
    <head>
        <title>Relatorio</title>
    </head>
    <body>
       <?php
	session_start();
        include_once 'php/conexao.php';
                
                $data = $_GET['id'];
                $query = "SELECT * FROM rel_relatorio WHERE data_relatorio = '$data' LIMIT 1";
                $st = mysqli_query($conexao, $query);	
                $row_usuario = mysqli_fetch_assoc($st);	

                    echo '<html>'
                                .'<body>'
                                .'<h1>Relatorio Semanal de Celula</h1>'
                                .'Data da Celula: "'.$row_usuario['data_relatorio'].'"<br>'
                                .'Nome do Membro: "'.$row_usuario['nome_relatorio'].'"<br>'
                                .'Codigo do Lider: "'.$row_usuario['lider_relatorio'].'"<br>'
                                .'Status: "'.$row_usuario['status_relatorio'].'"<br>'
                                .'</body>'
                        .'</html>';
        ?> 
    </body>
</html>

