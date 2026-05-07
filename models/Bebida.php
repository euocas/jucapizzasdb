<?php

class Bebida{
    private $conn;

    private $tabela = "bebidas";

    public $idBebida;
    
    public $nome;

    public $tamanho;

    public $valor;

    public $categoria;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getall(){
        // SALVANDO A QUERY SQL NA VARIAVEL
        $query = "SELECT idBebida, nome, tamanho, valor, categoria FROM " . $this->tabela;

        // PREPARANDO QUERY PARA EXECUTAR COM CONEXAO DO BANCO DE DADOS

        $stmt = $this->conn->prepare($query);

        // EXECUTANDO QUERY NO BANCO
        $stmt->execute();

        // RETORNANDO RESULTADO
        return $stmt;

    }

    
    public function get(){
        $query = 'SELECT
            idBebida,
            nome,
            valor,
            tamanho,
            categoria
        FROM
            ' . $this->tabela . '
        WHERE
            idBebida = ?
        LIMIT 1';
 
         // Prepara a query
        $stmt = $this->conn->prepare($query);
 
        // Vincula o ID
        $stmt->bindParam(1, $this->idBebida);
   
        // Executa a query
        $stmt->execute();
 
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
        // Define as propriedades
        $this->nome = $row['nome'];
        $this->valor = $row['valor'];
        $this->tamanho = $row['tamanho'];
        $this->categoria = $row['categoria'];
    }
}