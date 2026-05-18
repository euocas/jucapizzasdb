<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Bebida.php';

// Instanciar o banco de dados e conectar
$database = new Database();
$db = $database->getConnection();

// Instanciar o objeto Bebida
$bebida = new Bebida($db);

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {

    try {

        // Obter os dados enviados
        $data = json_decode(file_get_contents("php://input"));

        // Verificar se os dados estão completos
        if (
            !empty($data->id) &&
            !empty($data->nome) &&
            !empty($data->valor) &&
            !empty($data->tamanho) &&
            !empty($data->categoria)
        ) {

            // Atribuir ID
            $bebida->idBebida = $data->id;

            // Atribuir demais valores
            $bebida->nome = $data->nome;
            $bebida->valor = $data->valor;
            $bebida->tamanho = $data->tamanho;
            $bebida->categoria = $data->categoria;

            // Atualizar bebida
            if ($bebida->update()) {

                http_response_code(200);

                echo json_encode(
                    array('Mensagem' => 'Bebida atualizada com sucesso')
                );

            } else {

                http_response_code(500);

                echo json_encode(
                    array('Mensagem' => 'Não foi possível atualizar a bebida')
                );
            }

        } else {

            http_response_code(400);

            echo json_encode(
                array('Mensagem' => 'Dados incompletos. Não foi possível atualizar a bebida.')
            );
        }

    } catch (Exception $e) {

        echo json_encode(
            array("erro" => $e->getMessage())
        );
    }

} else {

    http_response_code(405);

    echo json_encode(
        array("erro" => "Método não suportado!")
    );
}
?>