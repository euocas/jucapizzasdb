<?php
// CRIAÇÃO DA ROTA GETALL.PHP
 
// HEADERS OBRIGATÓRIOS PARA PERMITIR REQUISIÕES DE QUALQUER ORIGEM
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
 
// try{ colocar para demonstrar erro com coluna errada mas lá no método read em pizza
    // Chamar o método read() para buscar as pizzas
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $stmt = $pizza->getAll();
        $num = $stmt->rowCount();
    
    if ($num > 0) {
        $pizzas_arr = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $pizza_item = array(
                "id" => $idPizza,
                "nome" => $nome,
                "ingredientes" => $ingredientes,
                "valor" => $valor
            );
 
            array_push($pizzas_arr, $pizza_item);
        }
 
        // Definir o código de resposta como 200 OK
        // http_response_code(200);
        header("http/1.1 200 OK");
 
        // Mostrar os dados das pizzas em formato JSON
        echo json_encode($pizzas_arr);
    } else {
        // Se nenhuma pizza for encontrada, definir o código de resposta como 404 Not Found
        http_response_code(404);
 
        // Informar ao usuário que nenhuma pizza foi encontrada
        echo json_encode(
            array("message" => "Nenhuma pizza encontrada.")
        );
        
    } 
    } else {
        // http_response_code(405);
        header("http/1.1 405 Method Not Allowed");
        echo json_encode(array("message" => "Método não permitido."));
    }
// }
// catch (Exception $e) {
//  echo json_encode(array("erro" => $e->getMessage()));
// }