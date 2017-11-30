<?php

session_start();
unset($_SESSION['id_usuario'], $_SESSION['senha_usuario'], $_SESSION['email_usuario'], $_SESSION['nome_usuario'],$_SESSION['nivel_id']);

$_SESSION['msg'] = "Deslogado com sucesso";
header("location:../../index.php");
