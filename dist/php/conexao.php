<?php
    
$host = "localhost";
$usuario = "root";
$senha = "";
$bd = "icbrelatorios";

$mysqli = new mysqli($host, $usuario, $senha, $bd);

if ($mysqli->connect_errno) {
    echo "Falha de conexão(" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


