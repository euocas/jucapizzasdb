<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste de Conexão - Juca Pizzas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="page">
        <header>
            <h1>Teste de Conexão com o Banco de Dados</h1>
        </header>
        <div class="result">
            <?php
            require_once 'config/Database.php';
            $database = new Database();
            $conn = $database->getConnection();
            if ($conn) {
                echo "<p class='success'>Conexão bem-sucedida! 📡</p>";
            } else {
                echo "<p class='error'>Falha na conexão. Verifique as credenciais no arquivo config/Database.php e se o banco de dados 'jucapizzasdb' existe.</p>";
            }
            ?>
            <p><a href="index.php">Voltar para a página inicial</a></p>
        </div>
        <footer>
            <p>&copy; 2026 Juca Pizzas</p>
        </footer>
    </div>
</body>
</html>