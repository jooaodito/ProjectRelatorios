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
                            .'<button type="button" id="'.$res['id_lider'].'" class="btn btn-success lista" data-toggle="modal" data-target="#modallista"><i class="fa fa-check"></i> &nbsp;Fazer chamada</button>'
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
                            .'<a href="../pages/lista.php" type="button" class="btn btn-success lista"><i class="fa fa-check"></i> &nbsp;Fazer chamada</a>'
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
