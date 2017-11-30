<?php
session_start();
require_once ('conexao.php');

//sleep(1);

switch ($_POST['acao']){
    case 'cadastro':
        //print_r($_POST);
        
        $c['nome_celula'] = $_POST['nome'];
        $c['rede_rede'] = $_POST['rede'];
        $c['id_lider'] = $_POST['superior'];
        
        if(in_array('', $c)){
            echo 'erro';
        }else{
            
            $campos = implode(',', array_keys($c));
            $values = "'".implode("', '", array_values($c))."'";
            $query = "INSERT INTO rel_celula (".$campos.") VALUES (".$values.")";
            $st = mysqli_query($conexao, $query) or die('errosend');
            if(!empty($st)){
                echo $c['nome_celula'];
            }else{
                echo 'errosend';
            }
            
        }
        
    break;
    
    case 'ler':

        
        $nivel = $_SESSION['nivel_id'];
        $id = $_SESSION['id_usuario'];
        
            $query  = "select data_relatorio, lider_relatorio, count(data_relatorio)
                        from rel_relatorio
                        group by data_relatorio
                        having count(data_relatorio)>1";
            $st     = mysqli_query($conexao, $query) or die ('errosend');
            if(mysqli_num_rows($st) >=1){
                while($res = mysqli_fetch_assoc($st)):
                    echo    '<tr>'
                            .'<td>'.$res['data_relatorio'].'</td>'
                            .'<td>'.$res['lider_relatorio'].'</td>'
                            .'<td>'
                            .'<a href="../gerar_pdf.php" type="submit" class="btn btn-default" target="_blank">Visualizar</a>'
                            .'</td>'
                            .'</tr>';
                    echo '<input type="hidden" name="datarel" value="'.$res['data_relatorio'].'" />'; 
                endwhile;
        }else{
                echo '<h3>NENHUM RELATORIO DE CELULA CADASTRADO</h3>';
            }
        
    break;
    
    case 'deletar':
        $delid = $_POST['del'];
        $query = "DELETE from rel_celula WHERE id_celula = '$delid'";
        $st = mysqli_query($conexao, $query);
        
    break;

    case 'consulta':
        
        
    break;
    
    default :
        echo '2';
}
