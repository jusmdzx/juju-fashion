<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $id = $_POST['id']; // O ID invisível
    $nome = $conn->real_escape_string($_POST['nome']);
    $preco = $conn->real_escape_string($_POST['preco']);
    $categoria = $conn->real_escape_string($_POST['categoria']);
    $descricao = $conn->real_escape_string($_POST['descricao']);
    
    // --- LÓGICA DA FOTO ---
    $arquivo = $_FILES['foto'];
    
    // Se o usuário mandou uma foto nova (size > 0)
    if($arquivo['size'] > 0) {
        
        // 1. Upload da nova foto
        $pasta = "imagens/";
        $nomeNovo = uniqid() . "-" . $arquivo['name'];
        $destino = $pasta . $nomeNovo;
        move_uploaded_file($arquivo['tmp_name'], $destino);

        // 2. Atualiza TUDO no banco (incluindo a imagem)
        $sql = "UPDATE produtos SET nome='$nome', preco='$preco', categoria='$categoria', descricao='$descricao', imagem='$destino' WHERE id=$id";

    } else {
        // Se NÃO mandou foto nova, atualiza só os textos (mantém a foto velha)
        $sql = "UPDATE produtos SET nome='$nome', preco='$preco', categoria='$categoria', descricao='$descricao' WHERE id=$id";
    }

    if($conn->query($sql) === TRUE) {
        echo "<script>alert('Produto atualizado!'); window.location='index.php';</script>";
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>