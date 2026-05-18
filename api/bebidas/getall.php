<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once __DIR__ . '/../../config/Database.php';
include_once __DIR__ . '/../../models/Bebida.php';

$database = new Database();
$db = $database->getConnection();

$bebidas = new Bebida($db);

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
