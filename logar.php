<?php
session_start(); // INICIA A SESSÃO (Obrigatório para login)
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verifica no banco se existe esse usuário e senha
    // OBS: Em projetos reais, usaríamos password_hash para a senha não ficar exposta
    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // ACHOU! O login está certo.
        $usuario = $result->fetch_assoc();
        
        // Cria a sessão (A "carteirinha" virtual)
        $_SESSION['id'] = $usuario['id'];
        $_SESSION['email'] = $usuario['email'];

        header('Location: index.php'); // Manda para a loja
    } else {
        echo "<script>alert('E-mail ou senha incorretos!'); window.location='login.php';</script>";
    }
}
?>