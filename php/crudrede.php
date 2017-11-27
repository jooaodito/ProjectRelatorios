<?php
require_once ('conexao.php');

sleep(1);

switch ($_POST['acao']){
    case 'cadastro':
        
        $c['descricao_rede'] = $_POST['descnivel'];
        
        if(in_array('', $c)){
            echo 'erro';
        }else{
            
            $campos = implode(',', array_keys($c));
            $values = "'".implode("', '", array_values($c))."'";
            $query = "INSERT INTO rel_rede (".$campos.") VALUES (".$values.")";
            $st = mysqli_query($conexao, $query) or die('errosend');
            if(!empty($st)){
                echo $c['descricao_rede'];
            }else{
                echo 'errosend';
            }
            
        }
        
    break;
    
    case 'ler':

        $query  = "SELECT * FROM rel_rede ORDER BY descricao_rede ASC";
        $st     = mysqli_query($conexao, $query) or die ('errosend');
        if(mysqli_num_rows($st) >=1){
            while($res = mysqli_fetch_assoc($st)):
                echo    '<tr class="j_'.$res['id_rede'].'">'
                        .'<td>'.$res['id_rede'].'</td>'
                        .'<td>'.$res['descricao_rede'].'</td>'
                        .'<td>' 
                        .'<button type="button" id="'.$res['id_rede'].'" class="btn btn-default j_editar" data-toggle="modal" data-target="#modaleditar"><i class="glyphicon glyphicon-cog"></i> &nbsp;Editar</button>&nbsp;'
                        .'<button type="button" id="'.$res['id_rede'].'" class="btn btn-danger excluir"><i class="glyphicon glyphicon-trash"></i> &nbsp;Excluir</button>'
                        .'</td>'
                        .'</tr>';
            endwhile;
        }else{
            echo 'noresult';
        }
        
    break;
    
    case 'deletar':
        $delid = $_POST['del'];
        $query = "DELETE from rel_rede WHERE id_rede = '$delid'";
        $st = mysqli_query($conexao, $query);
        
    break;

    case 'consulta':
        $idedit = $_POST['editarid'];
        $query = "SELECT * FROM rel_rede WHERE id_rede = '$idedit'";
        $st = mysqli_query($conexao, $query);
        $ex = mysqli_fetch_assoc($st);
        
    break;
    
    default :
        echo '2';
}
