<?php
session_start();
require_once ('conexao.php');

sleep(1);

    $cont = 1;

switch ($_POST['acao']){
    case 'cadastro':
        //print_r($_POST);
        
        $total = $_POST['total'];
        $c['data_relatorio'] = $_POST['data'];
        
        if(in_array('', $c)){
            echo 'erro';
        }else{
            $n = 1;
            for($n = 1; $n <= $total; $n++){
                $c['membro_relatorio'] = $_POST['nome'.$n];
                $c['lider_relatorio'] = $_POST['lider'.$n];
                $c['status_relatorio'] = $_POST['opt'.$n];
                $values = "'".implode("', '", array_values($c))."'";
                $campos = implode(',', array_keys($c));
                $query = "INSERT INTO rel_relatorio (".$campos.") VALUES (".$values.")";
                
                $st = mysqli_query($conexao, $query) or die('errosend');
                if(!empty($st)){
                    echo ('semanal');
                }else{
                    echo 'errosend';
                }
            }
        }
        
    break;
    
    case 'ler':

            $id = $_SESSION['id_usuario'];
        
            $query  = "SELECT * FROM rel_user WHERE lider_usuario = '$id' ORDER BY nome_usuario ASC";
            $st     = mysqli_query($conexao, $query) or die ('errosend');
            if(mysqli_num_rows($st) >=1){
                while($res = mysqli_fetch_assoc($st)):
                    echo    '<tr class="j_'.$res['id_usuario'].'">'
                            .'<td><label>'.$res['id_usuario'].'<input type="hidden" name="id'.$cont.'" value="'.$res['id_usuario'].'"></label></td>'
                            .'<td><label>'.$res['nome_usuario'].'<input type="hidden" name="nome'.$cont.'" value="'.$res['nome_usuario'].'"></label></td>'
                            .'<td><label>'.$_SESSION['id_usuario'].'<input type="hidden" name="lider'.$cont.'" value="'.$_SESSION['id_usuario'].'"></label></td>'
                            .'<td><div class="form-check"><label class="form-check-label">'
                            .'<input class="form-check-input" name="opt'.$cont.'" type="checkbox" id="inlineCheckbox1" value="Presente"></td>'
                            .'<td><input class="form-check-input" name="opt'.$cont.'" type="checkbox" id="inlineCheckbox1" value="Ausente"></label></div></td>'
                            .'</tr>';
                            $cont++;
                endwhile;
                echo '<input type="hidden" name="total" value="'.($cont-1).'" />';
        }else{
                echo '<h3>NENHUMA CELULA CADASTRADA</h3>';
            }
        
    break;
    
    case 'deletar':
        $delid = $_POST['del'];
        $query = "DELETE from rel_celula WHERE id_celula = '$delid'";
        $st = mysqli_query($conexao, $query);
        
    break;

    case 'consulta':
        
        
        $query = "SELECT * FROM rel_user";
        $st    = mysqli_query($conexao, $query) or die ('errosend');
        if(mysqli_num_rows($st) >=1){
            while($res = mysqli_fetch_assoc($st)):
                echo    '<tr class="j_'.$res['id_usuario'].'">'
                        .'<td>'.$res['nome_usuario'].'</td>'
                        .'<td>' 
                        .'<button type="button" id="'.$res['descricao_rede'].'" class="btn btn-defalt selecionar2">Selecionar</button>'
                        .'</td>'
                        .'</tr>';
            endwhile;
        }else{
            echo 'noresult';
        }
        
    break;
    
    default :
        echo '2';
}
