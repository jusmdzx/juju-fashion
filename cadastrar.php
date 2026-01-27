<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Um CSS extra só para este formulário ficar centralizado */
        .form-container { max-width: 500px; margin: 50px auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        input, textarea, select { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        label { font-weight: bold; color: #333; }
        .btn-salvar { background-color: #2ecc71; color: white; border: none; padding: 15px; width: 100%; font-size: 16px; cursor: pointer; font-weight: bold; border-radius: 5px; }
        .btn-salvar:hover { background-color: #27ae60; }
        .btn-voltar { display: block; text-align: center; margin-top: 15px; color: #666; text-decoration: none; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2 style="text-align:center;">Nova Peça de Roupa</h2>
        
        <form action="salvar.php" method="POST" enctype="multipart/form-data">
            
            <label>Nome da Peça:</label>
            <input type="text" name="nome" required placeholder="Ex: Jaqueta Jeans">

            <label>Preço (R$):</label>
            <input type="number" name="preco" step="0.01" required placeholder="0.00">

            <label>Categoria:</label>
            <select name="categoria">
                <option value="Blusas">Blusas</option>
                <option value="Calças">Calças</option>
                <option value="Vestidos">Vestidos</option>
                <option value="Acessórios">Acessórios</option>
            </select>

            <label>Descrição:</label>
            <textarea name="descricao" rows="4" placeholder="Detalhes do produto..."></textarea>

            <label>Foto do Produto:</label>
            <input type="file" name="foto" accept="image/*" required>

            <button type="submit" class="btn-salvar">Cadastrar Produto</button>
            <a href="index.php" class="btn-voltar">Voltar para a Loja</a>
        </form>
    </div>
</body>
</html>