<?php
session_start();
include 'conexao.php';

// Busca os produtos do seu banco de dados
$sql = "SELECT * FROM produtos";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Juju Fashion Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <nav>
        <a href="index.php">🏠 Meu Estoque</a>
        |
        <a href="vitrine_api.php">🌎 Catálogo Internacional</a>
    </nav>

    <header>
        <h1>Juju Fashion</h1>
        <p>Estilo e Conforto</p>

        <div style="margin-top: 15px;">
            <?php if (isset($_SESSION['id'])): ?>
                <span style="color: #2ecc71; margin-right: 10px;">Olá, Chefe! 👩‍💻</span>
                
                <a href="cadastrar.php" style="background: white; color: black; padding: 5px 10px; text-decoration: none; border-radius: 4px; font-weight: bold;">
                    + Novo Produto
                </a>
                
                <a href="logout.php" style="color: #aaa; margin-left: 10px; text-decoration: none; font-size: 14px;">
                    Sair
                </a>
            <?php else: ?>
                <a href="login.php" style="color: white; text-decoration: none; font-size: 14px;">
                    🔒 Área Restrita
                </a>
            <?php endif; ?>
        </div>
    </header>

    <div class="container">
        <?php
        if ($resultado->num_rows > 0) {
            while($produto = $resultado->fetch_assoc()) {
        ?>
            
            <div class="produto-card">
                <img src="<?php echo $produto['imagem']; ?>" alt="Foto da Roupa">
                
                <div class="info">
                    <h3><?php echo $produto['nome']; ?></h3>
                    <p><?php echo $produto['descricao']; ?></p>
                    
                    <div class="preco">
                        R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?>
                    </div>

                    <div style="display:flex; gap:10px; margin-top:10px;">
                        
                        <a href="https://wa.me/5587999999999?text=Olá, tenho interesse na peça: <?php echo $produto['nome']; ?>" 
                           target="_blank"
                           style="flex:1; background-color:#25D366; color:white; padding:10px; border-radius:4px; text-decoration:none; text-align:center; font-weight:bold;">
                           Comprar 📱
                        </a>

                        <?php if (isset($_SESSION['id'])): ?>
                            <a href="editar.php?id=<?php echo $produto['id']; ?>" 
                               style="background:#f39c12; color:white; padding:10px; border-radius:4px; text-decoration:none;">
                               ✏️
                            </a>

                            <a href="excluir.php?id=<?php echo $produto['id']; ?>" 
                               style="background:red; color:white; padding:10px; border-radius:4px; text-decoration:none;"
                               onclick="return confirm('Tem certeza que quer apagar essa roupa?');">
                               🗑️
                            </a>
                        <?php endif; ?>
                        
                    </div>
                </div>
            </div>

        <?php
            }
        } else {
            echo "<p style='text-align:center; width:100%;'>Nenhum produto cadastrado :(</p>";
        }
        ?>
    </div>

</body>
</html>