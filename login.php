<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Área Restrita</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Centralizar o login na tela */
        body { display: flex; justify-content: center; align-items: center; height: 100vh; }
        .login-card { background: white; padding: 40px; border-radius: 10px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); width: 300px; text-align: center; }
        input { width: 100%; margin: 10px 0; padding: 10px; }
        button { width: 100%; padding: 10px; background: #6200ea; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="login-card">
        <h2>🔒 Área Restrita</h2>
        <form action="logar.php" method="POST">
            <input type="email" name="email" placeholder="Seu E-mail" required>
            <input type="password" name="senha" placeholder="Sua Senha" required>
            <button type="submit">Entrar</button>
        </form>
        <br>
        <a href="index.php" style="font-size: 12px; color: #666;">Voltar para a Loja</a>
    </div>
</body>
</html>