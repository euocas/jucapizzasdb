<?php
 
require_once 'models/Bebida.php';
require_once 'config/Database.php';

echo "<h1>Testando Conexão e Modelo Bebida</h1>";
 
$database = new Database();
$db = $database->getConnection();
 
if (!$db) {
    echo "<p style='color: red;'>Falha na conexão.</p>";
    die();
}
 
echo "<p style='color: green;'>Conexão bem-sucedida!</p>";
 
echo "<h2>Buscando bebidas no banco...</h2>";
 
// Instância da classe correta (Bebida)
$bebidas = new Bebida($db);
$stmt = $bebidas->getall();

// Verifica se retornou algo
if ($stmt->rowCount() > 0) {
    echo "<pre>";
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        print_r($row);
    }

    echo "</pre>";
} else {
    echo "<p>Nenhuma bebida encontrada.</p>";
}