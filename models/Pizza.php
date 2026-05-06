<?php

class pizza
{
    private $conn;
    private $tabela = "pizzas";
    public $idPizza;
    public $nome;
    public $ingredientes;
    public $valor;


    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll(){
        //SALVANDO A QUERY EM SQL EM UMA VARIAVEL
        $query = "SELECT idPizza, nome, ingredientes, valor FROM " . $this->tabela;
        //PREPARANDO A QUERY PARA SER EXECUTADA OU SEJA VINCULANDO ELA À CONEXÃO
        $stmt = $this->conn->prepare($query);
        //EXECUTANDO A QUERY
        $stmt->execute();
        //RETORNANDO O RESULTADO DA QUERY   
        return $stmt;

    }

    public function get(){
        $query = 'SELECT
            idPizza,
            nome,
            ingredientes,
            valor
        FROM
            ' . $this->tabela . '
        WHERE
            idPizza = ?
        LIMIT 1';
 
         // Prepara a query
        $stmt = $this->conn->prepare($query);
 
        // Vincula o ID
        $stmt->bindParam(1, $this->idPizza);
   
        // Executa a query
        $stmt->execute();
 
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
        // Define as propriedades
        $this->nome = $row['nome'];
        $this->ingredientes = $row['ingredientes'];
        $this->valor = $row['valor'];
    }


}