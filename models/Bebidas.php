<?php

class Bebidas
{
    private $conn;
    private $tabela = "bebidas";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $query = "SELECT idBebida, nome, tamanho, valor, categoria FROM " . $this->tabela;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
