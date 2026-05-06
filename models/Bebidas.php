<?php

class Bebidas{
    private $conn;

    private $tabela = "bebidas";

    private $idBebidas;
    
    public $nome;

    public $tamanho;

    public $valor;

    public $categoria;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getall(){
        // SALVANDO A QUERY SQL NA VARIAVEL
        $sql = "SELECT idBebida, nome, tamanho, valor, categoria FROM " . $this->tabela;

        // PREPARANDO QUERY PARA EXECUTAR COM CONEXAO DO BANCO DE DADOS

        $stmt = $this->conn->prepare($sql);

        // EXECUTANDO QUERY NO BANCO
        $stmt->execute();

        // RETORNANDO RESULTADO
        return $stmt;

    }
}