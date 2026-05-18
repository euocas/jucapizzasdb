<?php



class Bebida

{

    private $conn;

    private $tabela = "bebidas";

    public $idBebida;

    public $nome;

    public $tamanho;

    public $valor;

    public $categoria;



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



    public function get()

    {

        $query = 'SELECT idBebida, nome, tamanho, valor, categoria FROM '

            . $this->tabela . ' WHERE idBebida = ? LIMIT 1';

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->idBebida);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {

            return false;

        }

        $this->idBebida = $row['idBebida'];

        $this->nome = $row['nome'];

        $this->tamanho = $row['tamanho'];

        $this->valor = $row['valor'];

        $this->categoria = $row['categoria'];

        return true;

    }



    public function add()

    {

        $query = 'INSERT INTO ' . $this->tabela

            . ' (nome, tamanho, valor, categoria) VALUES (?, ?, ?, ?)';

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->nome);

        $stmt->bindParam(2, $this->tamanho);

        $stmt->bindParam(3, $this->valor);

        $stmt->bindParam(4, $this->categoria);

        return $stmt->execute();

    }



    public function update()

    {

        $query = 'UPDATE ' . $this->tabela . '

              SET nome = :nome,

                  valor = :valor,

                  tamanho = :tamanho,

                  categoria = :categoria

              WHERE idBebida = :id';



        $stmt = $this->conn->prepare($query);



        $this->nome = htmlspecialchars(strip_tags($this->nome));

        $this->valor = htmlspecialchars(strip_tags($this->valor));

        $this->tamanho = htmlspecialchars(strip_tags($this->tamanho));

        $this->categoria = htmlspecialchars(strip_tags($this->categoria));

        $this->idBebida = htmlspecialchars(strip_tags($this->idBebida));



        $stmt->bindParam(':nome', $this->nome);

        $stmt->bindParam(':valor', $this->valor);

        $stmt->bindParam(':tamanho', $this->tamanho);

        $stmt->bindParam(':categoria', $this->categoria);

        $stmt->bindParam(':id', $this->idBebida);



        if ($stmt->execute()) {

            return true;

        }



        return false;

    }

}


