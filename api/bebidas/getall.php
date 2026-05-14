<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

<<<<<<< HEAD:api/bebida/getall.php
include_once __DIR__ . '/../../config/Database.php';
include_once __DIR__ . '/../../models/Bebidas.php';
=======
// Incluir arquivos
include_once '../../config/Database.php';
include_once '../../models/Bebida.php';
>>>>>>> c71ad90f5f1a713bf9ad14ee2cb91de7d0945afd:api/bebidas/getall.php

$database = new Database();
$db = $database->getConnection();

<<<<<<< HEAD:api/bebida/getall.php
$bebidas = new Bebidas($db);
=======
// Instanciar a classe correta
$bebidas = new Bebida($db);
>>>>>>> c71ad90f5f1a713bf9ad14ee2cb91de7d0945afd:api/bebidas/getall.php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $stmt = $bebidas->getAll();

    if ($stmt->rowCount() > 0) {

        $bebidas_arr = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $bebida_item = array(
                "id" => $row['idBebida'],
                "nome" => $row['nome'],
                "tamanho" => $row['tamanho'],
                "valor" => $row['valor'],
                "categoria" => $row['categoria']
            );

            array_push($bebidas_arr, $bebida_item);
        }

        http_response_code(200);
        echo json_encode($bebidas_arr);

    } else {

        http_response_code(404);
        echo json_encode(array(
            "mensagem" => "Nenhuma bebida encontrada."
        ));
    }

} else {

    http_response_code(405);
    echo json_encode(array(
        "mensagem" => "Método não permitido."
    ));
}