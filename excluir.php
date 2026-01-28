<?php
include 'conexao.php';

// Verifica se veio um ID lá do link
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // 1. Antes de apagar do banco, vamos apagar a FOTO da pasta (para não encher seu PC de lixo)
    $sql_foto = "SELECT imagem FROM produtos WHERE id = $id";
    $resultado = $conn->query($sql_foto);
    
    if ($resultado->num_rows > 0) {
        $produto = $resultado->fetch_assoc();
        $caminho_foto = $produto['imagem'];
        
        // Se o arquivo existe na pasta, apaga ele
        if (file_exists($caminho_foto)) {
            unlink($caminho_foto); // unlink é o comando do PHP para deletar arquivos
        }
    }

    // 2. Agora sim, apaga do Banco de Dados
    $sql = "DELETE FROM produtos WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Produto excluído!'); window.location='index.php';</script>";
    } else {
        echo "Erro ao excluir: " . $conn->error;
    }

} else {
    // Se tentarem abrir excluir.php sem passar ID, volta pra loja
    header('Location: index.php');
}
?>