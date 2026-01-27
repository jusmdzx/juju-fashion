<?php
include 'conexao.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
   // O comando real_escape_string "protege" o texto contra aspas proibidas
    $nome = $conn->real_escape_string($_POST['nome']);
    $preco = $conn->real_escape_string($_POST['preco']);
    $categoria = $conn->real_escape_string($_POST['categoria']);
    $descricao = $conn->real_escape_string($_POST['descricao']);
    // --- LÓGICA DE UPLOAD DE IMAGEM ---
    $arquivo = $_FILES['foto'];
    
    // Se o arquivo existe e não deu erro
    if($arquivo['error'] == 0) {
        
        $pasta = "imagens/";
        // Gera um nome único para a foto (ex: 1738493-nome.jpg)
        $nomeNovo = uniqid() . "-" . $arquivo['name'];
        $destino = $pasta . $nomeNovo;

        // Tenta mover a foto da pasta temporária para a pasta 'imagens'
        if(move_uploaded_file($arquivo['tmp_name'], $destino)) {
            
            // Se deu certo o upload, salva no BANCO
            // Atenção: No banco salvamos o CAMINHO (imagens/foto.jpg), não a foto em si
            $sql = "INSERT INTO produtos (nome, preco, imagem, descricao, categoria) 
                    VALUES ('$nome', '$preco', '$destino', '$descricao', '$categoria')";

            if($conn->query($sql) === TRUE) {
                echo "<script>alert('Produto cadastrado com sucesso!'); window.location='index.php';</script>";
            } else {
                echo "Erro no banco: " . $conn->error;
            }

        } else {
            echo "Erro ao salvar o arquivo na pasta.";
        }
    }
}
?>