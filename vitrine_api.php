<?php
// Lógica para escolher a categoria
if (isset($_GET['cat'])) {
    $categoria_escolhida = $_GET['cat'];
} else {
    $categoria_escolhida = "women's clothing"; // Padrão
}

// Corrige o espaço para a API entender (troca espaço por %20)
$categoria_formatada = str_replace(' ', '%20', $categoria_escolhida);

// Monta a URL
$url = "https://fakestoreapi.com/products/category/" . $categoria_formatada;

// Pega os dados
$dados_json = file_get_contents($url);
$produtos = json_decode($dados_json);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Catálogo Internacional - API</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <nav>
        <a href="index.php">🏠 Meu Estoque</a>
        |
        <a href="vitrine_api.php">🌎 Catálogo Internacional</a>
    </nav>

    <header>
        <h1>Mundo da Moda</h1>
        <p>Importados via API</p>

        <div style="margin-top: 20px;">
            <a href="vitrine_api.php?cat=women's clothing" class="btn-cat" style="background:#e91e63;">👩 Feminino</a>
            <a href="vitrine_api.php?cat=men's clothing" class="btn-cat" style="background:#3498db;">👨 Masculino</a>
            <a href="vitrine_api.php?cat=jewelery" class="btn-cat" style="background:#f1c40f; color:black;">💍 Joias</a>
            <a href="vitrine_api.php?cat=electronics" class="btn-cat" style="background:#34495e;">💻 Eletrônicos</a>
        </div>
    </header>

    <div class="container">
        <?php
        if ($produtos) {
            foreach($produtos as $produto) {
        ?>
            
            <div class="produto-card">
                <img src="<?php echo $produto->image; ?>" alt="Foto">
                
                <div class="info">
                    <h3><?php echo substr($produto->title, 0, 30) . "..."; ?></h3>
                    
                    <div class="preco">
                        <?php 
                        // CONVERSÃO DE MOEDA
                        $preco_real = $produto->price * 5.60; // Dólar fictício
                        echo "R$ " . number_format($preco_real, 2, ',', '.'); 
                        ?>
                        <span style="font-size:12px; color:#999; font-weight:normal;">(Importado)</span>
                    </div>
                    
                    <button style="background:#333; color:white;" onclick="alert('Este produto vem da FakeStoreAPI nos EUA!')">
                        Ver Detalhes
                    </button>
                </div>
            </div>

        <?php
            } 
        } else {
            echo "<p>Erro ao carregar produtos da API.</p>";
        }
        ?>
    </div>

</body>
</html>