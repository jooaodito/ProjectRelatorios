<?php
    session_start();

    if((!isset ($_SESSION['id_usuario']) == true)){
        
        unset($_SESSION['email_usuario']);
        unset($_SESSION['senha_usuario']);
        $_SESSION['msg'] = "Área reistrita!";
        header("location:../../index.php");
    }

