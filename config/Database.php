<?php

class Database {
    private $host = 'localhost';
    private $db_name = 'jucapizzasdb';
    private $username = 'root';
    private $password = 'usbw';
    private $port = '3307';
    
    public $conn;
    public function getConnection()
    {
        $this->conn = null;

     try {
        //tenta executar um código potencialmente perigoso
        //DSN (Data Source Name) é uma string que contém as informações necessárias para se conectar a um banco de dados

        $dsn = 'mysql:host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->db_name . ';charset=utf8';
        //Cria uma nova conexão PDO usando o DSN, nome de usuário e senha fornecidos
        $this->conn = new PDO($dsn, $this->username, $this->password);

        //Define o modo de erro do PDO para exceção
        //Isso faz com que o PDO lance exceções em caso de erros, facilitando o tratamento de erros
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     } catch (PDOException $e) {
        //Em caso de erro na conexão, exibe a mensagem de erro
        echo "Connection error: " . $e->getMessage();

     } catch (Exception $e) {
            //Em caso de erro geral, exibe a mensagem de erro
            echo "General error: " . $e->getMessage();
         }
         return $this->conn;
    }
    }