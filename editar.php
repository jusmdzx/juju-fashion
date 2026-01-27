<?php
session_start();
// Verifica se é o chefe. Se não for, chuta pra fora!
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}

include 'conexao.php';

// Pega o ID que veio pelo link (ex: editar.php?id=5)
$id = $_GET['id'];

// Busca os dados desse produto específico
$sql = "SELECT * FROM produtos WHERE id = $id";
$resultado = $conn->query($sql);
$produto = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .form-container { max-width: 500px; margin: 50px auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        input, textarea, select { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        .btn-salvar { background-color: #f39c12; color: white; border: none; padding: 15px; width: 100%; font-size: 16px; cursor: pointer; font-weight: bold; border-radius: 5px; }
        .btn-salvar:hover { background-color: #e67e22; }
        .btn-voltar { display: block; text-align: center; margin-top: 15px; color: #666; text-decoration: none; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2 style="text-align:center;">✏️ Editar Produto</h2>
        
        <form action="atualizar.php" method="POST" enctype="multipart/form-data">
            
            <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">

            <label>Nome da Peça:</label>
            <input type="text" name="nome" required value="<?php echo $produto['nome']; ?>">

            <label>Preço (R$):</label>
            <input type="number" name="preco" step="0.01" required value="<?php echo $produto['preco']; ?>">

            <label>Categoria Atual: <b><?php echo $produto['categoria']; ?></b></label>
            <select name="categoria">
                <option value="Blusas">Blusas</option>
                <option value="Calças">Calças</option>
                <option value="Vestidos">Vestidos</option>
                <option value="Acessórios">Acessórios</option>
            </select>

            <label>Descrição:</label>
            <textarea name="descricao" rows="4"><?php echo $produto['descricao']; ?></textarea>

            <label>Foto Atual:</label><br>
            <img src="<?php echo $produto['imagem']; ?>" width="100" style="border-radius: 5px; margin-bottom: 10px;">
            <br>
            <label>Trocar Foto (Opcional):</label>
            <input type="file" name="foto" accept="image/*">

            <button type="submit" class="btn-salvar">Salvar Alterações</button>
            <a href="index.php" class="btn-voltar">Cancelar</a>
        </form>
    </div>
</body>
</html>