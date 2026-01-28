<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "loja_moda";

// Tenta fazer a conexão
$conn = new mysqli($host, $user, $pass, $banco);

// Verifica se deu erro
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
// Se não der erro, a vida segue e o site carrega!
?>