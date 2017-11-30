<?php
session_start();
require_once ('conexao.php');

sleep(1);

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
        
        if(($nivel == "Admin") || ($nivel == "Pastor")){
            $query  = "SELECT * FROM rel_celula ORDER BY nome_celula ASC";
            $st     = mysqli_query($conexao, $query) or die ('errosend');
            if(mysqli_num_rows($st) >=1){
                while($res = mysqli_fetch_assoc($st)):
                    echo    '<tr class="j_'.$res['id_celula'].'">'
                            .'<td>'.$res['id_celula'].'</td>'
                            .'<td>'.$res['nome_celula'].'</td>'
                            .'<td>'.$res['rede_rede'].'</td>'
                            .'<td>'.$res['id_lider'].'</td>'
                            .'<td>' 
                            .'<button type="button" id="'.$res['id_celula'].'" class="btn btn-default j_editar" data-toggle="modal" data-target="#modaleditar"><i class="glyphicon glyphicon-cog"></i> &nbsp;Editar</button>&nbsp;'
                            .'<button type="button" id="'.$res['id_celula'].'" class="btn btn-danger excluir"><i class="glyphicon glyphicon-trash"></i> &nbsp;Excluir</button>'
                            .'</td>'
                            .'</tr>';
                endwhile;
            }else{
                echo 'noresult';
            }
            
        }elseif (($nivel == "Lider") || ($nivel == "Discipulador")) {
            $query  = "SELECT * FROM rel_celula WHERE id_lider = '$id' ORDER BY nome_celula ASC";
            $st     = mysqli_query($conexao, $query) or die ('errosend');
            if(mysqli_num_rows($st) >=1){
                while($res = mysqli_fetch_assoc($st)):
                    echo    '<tr class="j_'.$res['id_celula'].'">'
                            .'<td>'.$res['id_celula'].'</td>'
                            .'<td>'.$res['nome_celula'].'</td>'
                            .'<td>'.$res['rede_rede'].'</td>'
                            .'<td>'.$res['id_lider'].'</td>'
                            .'<td>' 
                            .'<button type="button" id="'.$res['id_celula'].'" class="btn btn-default j_editar" data-toggle="modal" data-target="#modaleditar"><i class="glyphicon glyphicon-cog"></i> &nbsp;Editar</button>&nbsp;'
                            .'<button type="button" id="'.$res['id_celula'].'" class="btn btn-danger excluir"><i class="glyphicon glyphicon-trash"></i> &nbsp;Excluir</button>'
                            .'</td>'
                            .'</tr>';
                endwhile;
        }else{
                echo '<h3>NENHUMA CELULA CADASTRADA</h3>';
            }
        }else{
            echo '<tr>'
                 .'<td>Nenhum usuario emcontrado</td>'
                 .'</tr>';
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
        
        $value  = "Lider";
        $value2 = "Discipulador";
        $query  = "SELECT * FROM rel_user WHERE (nivel_id LIKE '%".$value."%') OR (nivel_id LIKE '%".$value2."%') ";
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
        $query = "DELETE from rel_celula WHERE id_celula = '$delid'";
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
