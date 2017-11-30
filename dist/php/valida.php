<?php
session_start();
include_once ("conexao.php");

$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
if($btnLogin){
    $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    
    if((!empty($usuario)) AND (!empty($senha))){
        
        //echo password_hash($senha, PASSWORD_DEFAULT)
        $result_usuario = "SELECT id_usuario, email_usuario, senha_usuario, nome_usuario, nivel_id FROM rel_user WHERE email_usuario = '$usuario' ";
        $resultado_usuario = mysqli_query($mysqli, $result_usuario);
        
        if($resultado_usuario){
            $row_usuario = mysqli_fetch_assoc($resultado_usuario);
            //if(password_verify($senha, $row_usuario['senha_usuario'])){
            if ($senha == $row_usuario['senha_usuario']){
                $_SESSION['id_usuario'] = $row_usuario['id_usuario'];
                $_SESSION['nome_usuario'] = $row_usuario['nome_usuario'];
                $_SESSION['email_usuario'] = $row_usuario['email_usuario'];
                $_SESSION['nivel_id'] = $row_usuario['nivel_id'];
                
                header("location:../../pages/paineluser.php");
                
            }else{
                $_SESSION['msg'] = "Login e Senha incorreto!";
                header("location:../../index.php");
            }
        }
        
    } else {
        $_SESSION['msg'] = "Login e Senha incorreto!";
        header("location:../../index.php");
    }
    
} else {
    $_SESSION['msg'] = "Pagina não encontrada!";
    header("location:../index.php");
}