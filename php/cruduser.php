<?php
require_once ('conexao.php');

sleep(1);

switch ($_POST['acao']){
    case 'cadastro':
        //print_r($_POST);
        
        $c['nome_usuario'] = $_POST['nome'];
        $c['datanasc_usuario'] = $_POST['nasc'];
        $c['nivel_id'] = $_POST['nivel'];
        $c['email_usuario'] = $_POST['email'];
        $c['senha_usuario'] = $_POST['senha'];
        $c['rede_rede'] = $_POST['rede'];
        $c['lider_usuario'] = $_POST['superior'];
        
        if(in_array('', $c)){
            echo 'erro';
        }else{
            
            $campos = implode(',', array_keys($c));
            $values = "'".implode("', '", array_values($c))."'";
            $query = "INSERT INTO rel_user (".$campos.") VALUES (".$values.")";
            $st = mysqli_query($conexao, $query) or die('errosend');
            if(!empty($st)){
                echo $c['nome_usuario'];
            }else{
                echo 'errosend';
            }
            
        }
        
    break;
    
    case 'ler':

        $query  = "SELECT * FROM rel_user ORDER BY nome_usuario ASC";
        $st     = mysqli_query($conexao, $query) or die ('errosend');
        if(mysqli_num_rows($st) >=1){
            while($res = mysqli_fetch_assoc($st)):
                echo    '<tr class="j_'.$res['id_usuario'].'">'
                        .'<td>'.$res['id_usuario'].'</td>'
                        .'<td>'.$res['nome_usuario'].'</td>'
                        .'<td>'.$res['datanasc_usuario'].'</td>'
                        .'<td>'.$res['nivel_id'].'</td>'
                        .'<td>'.$res['rede_rede'].'</td>'
                        .'<td>'.$res['lider_usuario'].'</td>'
                        .'<td>' 
                        .'<button type="button" id="'.$res['id_usuario'].'" class="btn btn-default j_editar" data-toggle="modal" data-target="#modaleditar"><i class="glyphicon glyphicon-cog"></i> &nbsp;Editar</button>&nbsp;'
                        .'<button type="button" id="'.$res['id_usuario'].'" class="btn btn-danger excluir"><i class="glyphicon glyphicon-trash"></i> &nbsp;Excluir</button>'
                        .'</td>'
                        .'</tr>';
            endwhile;
        }else{
            echo 'noresult';
        }
        
    break;
    
    case 'lernivel':

        $query  = "SELECT * FROM rel_nivel ORDER BY descricao_nivel ASC";
        $st     = mysqli_query($conexao, $query) or die ('errosend');
        if(mysqli_num_rows($st) >=1){
            while($res = mysqli_fetch_assoc($st)):
                echo    '<tr class="j_'.$res['id_nivel'].'">'
                        .'<td>'.$res['id_nivel'].'</td>'
                        .'<td>'.$res['descricao_nivel'].'</td>'
                        .'<td>' 
                        .'<button type="button" id="'.$res['descricao_nivel'].'" class="btn btn-defalt selecionar">Selecionar</button>'
                        .'</td>'
                        .'</tr>';
            endwhile;
        }else{
            echo 'noresult';
        }
        
    break;
    
    case 'lerrede':

        $query  = "SELECT * FROM rel_rede ORDER BY descricao_rede ASC";
        $st     = mysqli_query($conexao, $query) or die ('errosend');
        if(mysqli_num_rows($st) >=1){
            while($res = mysqli_fetch_assoc($st)):
                echo    '<tr class="j_'.$res['id_rede'].'">'
                        .'<td>'.$res['id_rede'].'</td>'
                        .'<td>'.$res['descricao_rede'].'</td>'
                        .'<td>' 
                        .'<button type="button" id="'.$res['descricao_rede'].'" class="btn btn-defalt selecionar2">Selecionar</button>'
                        .'</td>'
                        .'</tr>';
            endwhile;
        }else{
            echo 'noresult';
        }
        
    break;
    
    case 'lersuperior':
        
        $value = "Lider";
        $value2 = "Discipulador";
        $value3 = "Pastor";
        $query  = "SELECT * FROM rel_user WHERE ((nivel_id LIKE '%".$value."%') OR (nivel_id LIKE '%".$value2."%') OR (nivel_id LIKE '%".$value3."%'))";
        $st     = mysqli_query($conexao, $query) or die ('errosend');
        if(mysqli_num_rows($st) >=1){
            while($res = mysqli_fetch_assoc($st)):
                echo    '<tr class="j_'.$res['id_usuario'].'">'
                        .'<td>'.$res['id_usuario'].'</td>'
                        .'<td>'.$res['nome_usuario'].'</td>'
                        .'<td>'.$res['rede_rede'].'</td>'
                        .'<td>'.$res['nivel_id'].'</td>'
                        .'<td>' 
                        .'<button type="button" id="'.$res['id_usuario'].'" class="btn btn-defalt selecionar3">Selecionar</button>'
                        .'</td>'
                        .'</tr>';
            endwhile;
        }else{
            echo 'noresult';
        }
        
    break;
    
    case 'deletar':
        $delid = $_POST['del'];
        $query = "DELETE from rel_user WHERE id_usuario = '$delid'";
        $st = mysqli_query($conexao, $query);
        
    break;

    case 'consulta':
        $idedit = $_POST['editarid'];
        $query = "SELECT * FROM rel_nivel WHERE id_nivel = '$idedit'";
        $st = mysqli_query($conexao, $query);
        $ex = mysqli_fetch_assoc($st);
        
    break;
    
    default :
        echo '2';
}
