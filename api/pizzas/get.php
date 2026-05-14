<?php
//CRIAÇÃO ROTA GET.PHP
// Headers obrigatórios
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// Incluir arquivos de banco de dados e modelo
include_once '../../config/Database.php';
include_once '../../models/Pizza.php';
 
// Instanciar o objeto Database e obter a conexão
$database = new Database();
$db = $database->getConnection();
 
// Instanciar o objeto Pizza
$pizza = new Pizza($db);
 
$pizza->idPizza = isset($_GET['id']) ? $_GET['id'] : null;
 
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($pizza->idPizza) {
        if ($pizza->get()) {
            $pizza_arr = array(
                "id" => $pizza->idPizza,
                "nome" => $pizza->nome,
                "ingredientes" => $pizza->ingredientes,
                "valor" => $pizza->valor
            );
            echo json_encode($pizza_arr, JSON_PRETTY_PRINT);
        } else {
            http_response_code(404);
            echo json_encode(
                array("Erro" => "Pizza não encontrada.")
            );
        }
    } else {
        http_response_code(400);
        echo json_encode(
            array("Erro" => "Id não informado.")
        );
    }
} else {
     http_response_code(405);
    echo json_encode(
            array("Mensagem" => "Método não permitido.")
        );
}